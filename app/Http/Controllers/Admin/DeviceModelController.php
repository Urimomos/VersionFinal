<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeviceModel;
use App\Models\Brand;
use App\Models\Category;
use App\Models\RepairType; 
use Illuminate\Http\Request;

class DeviceModelController extends Controller
{
    public function index()
    {
        $deviceModels = DeviceModel::with(['brand', 'category'])->get();
        return view('admin.device-models.index', compact('deviceModels'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.device-models.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        DeviceModel::create($validated);

        return redirect()->route('admin.device-models.index')->with('success', 'Modelo de dispositivo creado exitosamente.');
    }

    public function edit(DeviceModel $deviceModel)
    {
        $brands = Brand::all();
        $categories = Category::all();

        // Obtenemos los IDs de las reparaciones que YA están asociadas a este modelo
        $existingRepairIds = $deviceModel->repairTypes()->pluck('repair_types.id')->toArray();

        // Obtenemos todos los tipos de reparación que AÚN NO están asociadas a este modelo
        $availableRepairTypes = RepairType::whereNotIn('id', $existingRepairIds)->get();

        return view('admin.device-models.edit', compact('deviceModel', 'brands', 'categories', 'availableRepairTypes'));
    }

    public function update(Request $request, DeviceModel $deviceModel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $deviceModel->update($validated);

        return redirect()->route('admin.device-models.index')->with('success', 'Modelo de dispositivo actualizado exitosamente.');
    }

    public function destroy(DeviceModel $deviceModel)
    {
        $deviceModel->delete();
        return redirect()->route('admin.device-models.index')->with('success', 'Modelo de dispositivo eliminado exitosamente.');
    }

    public function attachRepair(Request $request, DeviceModel $deviceModel)
    {
        $validated = $request->validate([
            'repair_type_id' => 'required|exists:repair_types,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Usamos attach() para crear el registro en la tabla pivote con el precio
        $deviceModel->repairTypes()->attach($validated['repair_type_id'], ['price' => $validated['price']]);

        return redirect()->back()->with('success', 'Reparación añadida al modelo exitosamente.');
    }

    public function detachRepair(DeviceModel $deviceModel, RepairType $repairType)
    {
        // Usamos detach() para eliminar el registro de la tabla pivote
        $deviceModel->repairTypes()->detach($repairType->id);

        return redirect()->back()->with('success', 'Reparación desvinculada del modelo exitosamente.');
    }
}