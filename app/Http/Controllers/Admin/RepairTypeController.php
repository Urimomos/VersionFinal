<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RepairType;
use Illuminate\Http\Request;

class RepairTypeController extends Controller
{
    public function index()
    {
        $repairTypes = RepairType::all();
        return view('admin.repair-types.index', compact('repairTypes'));
    }

    public function create()
    {
        return view('admin.repair-types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:repair_types|max:255',
            'description' => 'nullable|string',
            'base_price' => 'nullable|numeric|min:0',
        ]);

        RepairType::create($validated);

        return redirect()->route('admin.repair-types.index')->with('success', 'Tipo de reparación creado exitosamente.');
    }

    public function edit(RepairType $repairType)
    {
        return view('admin.repair-types.edit', compact('repairType'));
    }

    public function update(Request $request, RepairType $repairType)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:repair_types,name,' . $repairType->id . '|max:255',
            'description' => 'nullable|string',
            'base_price' => 'nullable|numeric|min:0',
        ]);

        $repairType->update($validated);

        return redirect()->route('admin.repair-types.index')->with('success', 'Tipo de reparación actualizado exitosamente.');
    }

    public function destroy(RepairType $repairType)
    {
        $repairType->delete();
        return redirect()->route('admin.repair-types.index')->with('success', 'Tipo de reparación eliminado exitosamente.');
    }
}