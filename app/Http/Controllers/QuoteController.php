<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DeviceModel; // <-- Añadir
use App\Models\Quote;       // <-- Añadir
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // <-- Importar Mail
use App\Mail\NewQuoteNotification; 
use App\Mail\QuoteConfirmationForUser;
use App\Models\CustomRequest;    // <-- Importar Mail
use App\Mail\CustomRequestNotification; 
use App\Mail\QuoteCancelledNotification;

class QuoteController extends Controller
{
    public function create()
    {
        // Solo necesitamos las categorías para el primer desplegable
        $categories = Category::orderBy('name')->get();

        return view('quote.create', compact('categories'));
    }

     // INICIO DEL NUEVO MÉTODO
    public function store(Request $request)
    {
        $validated = $request->validate([
            'device_model_id' => 'required|exists:device_models,id',
            'repairs' => 'required|array',
            'repairs.*' => 'exists:repair_types,id',
        ]);

        $deviceModel = DeviceModel::find($validated['device_model_id']);
        $savedQuotes = collect(); // Creamos una colección para guardar las cotizaciones

        foreach ($validated['repairs'] as $repairId) {
            $repair = $deviceModel->repairTypes()->findOrFail($repairId);
            $pricePart = $repair->pivot->price ?? 0;
            $priceBase = $repair->base_price ?? 0;
            $finalPrice = $pricePart + $priceBase;

            $quote = Quote::create([
                'user_id' => Auth::id(),
                'device_model_id' => $validated['device_model_id'],
                'repair_type_id' => $repairId,
                'price' => $finalPrice,
                'status' => 'pending',
            ]);
            $savedQuotes->push($quote); // Añadimos la cotización a la colección
        }

        // INICIO DE LA MODIFICACIÓN: Enviar el correo
        if ($savedQuotes->isNotEmpty()) {
            $adminEmail = "repara.fixme@gmail.com"; // <-- ¡¡CAMBIA ESTO POR TU CORREO!!
            Mail::to($adminEmail)->send(new NewQuoteNotification($savedQuotes));
            // INICIO DEL CAMBIO: Enviar correo de confirmación al usuario
            Mail::to($request->user()->email)->send(new QuoteConfirmationForUser($savedQuotes));
            // FIN DEL CAMBIO
        }
        // FIN DE LA MODIFICACIÓN

        return redirect()->route('dashboard')->with('success', '¡Tu cotización ha sido guardada exitosamente!');
    }
    // FIN DEL NUEVO MÉTODO

     // INICIO DEL NUEVO MÉTODO
    public function storeCustom(Request $request)
    {
        $validated = $request->validate([
            'device_description' => 'required|string|min:10',
            'problem_description' => 'required|string|min:10',
        ]);

        // Creamos la solicitud y la guardamos en una variable
        $customRequest = CustomRequest::create([
            'user_id' => Auth::id(),
            'device_description' => $validated['device_description'],
            'problem_description' => $validated['problem_description'],
            'status' => 'new',
        ]);

        // INICIO DE LA MODIFICACIÓN: Enviar el correo al admin
        $adminEmail = "repara.fixme@gmail.com"; // <-- ¡¡CAMBIA ESTO!!
        Mail::to($adminEmail)->send(new CustomRequestNotification($customRequest));
        // FIN DE LA MODIFICACIÓN

        return redirect()->route('dashboard')->with('success', '¡Tu solicitud especial ha sido enviada! Nos pondremos en contacto contigo pronto.');
    }
    // FIN DEL NUEVO MÉTODO

    public function destroy(Quote $quote)
    {
        // Verificación de seguridad: un usuario solo puede borrar sus propias cotizaciones
        if (auth()->id() !== $quote->user_id) {
            abort(403, 'Acción no autorizada.');
        }

        // Enviar notificación al administrador
        $adminEmail = "repara.fixme@gmail.com"; // <-- ¡CAMBIA ESTO!
        Mail::to($adminEmail)->send(new QuoteCancelledNotification($quote));

        // Eliminar la cotización
        $quote->delete();

        return redirect()->route('dashboard')->with('success', 'Tu cotización ha sido cancelada exitosamente.');
    }
}