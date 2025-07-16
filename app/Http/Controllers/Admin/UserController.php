<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        // Obtenemos todos los usuarios para listarlos
        $users = User::where('id', '!=', 1)->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo admin
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Se crea directamente como admin
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Administrador creado exitosamente.');
    }

    // INICIO DEL NUEVO MÉTODO
    public function show(User $user)
    {
        // Cargamos el usuario junto con sus cotizaciones y las relaciones de cada cotización
        $user->load('quotes.deviceModel.brand', 'quotes.repairType');

        return view('admin.users.show', compact('user'));
    }
    // FIN DEL NUEVO MÉTODO

    public function destroy(User $user)
    {
        // REGLA DE SEGURIDAD: No se puede borrar el usuario con ID 1 (el super admin)
        if ($user->id === 1) {
            return redirect()->route('admin.users.index')->with('error', 'No se puede eliminar al administrador principal.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado exitosamente.');
    }


}