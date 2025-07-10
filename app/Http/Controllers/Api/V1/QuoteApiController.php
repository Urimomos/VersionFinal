<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DeviceModel;
use Illuminate\Http\Request;

class QuoteApiController extends Controller
{
    public function getBrandsByCategory(Category $category)
    {
        // Esta lógica es un placeholder. Lo ideal es una relación muchos a muchos.
        // Por ahora, devolvemos todas las marcas.
        return response()->json(Brand::orderBy('name')->get());
    }

    public function getModelsByBrand(Brand $brand)
    {
        return response()->json($brand->deviceModels()->orderBy('name')->get());
    }

    public function getRepairsByModel(DeviceModel $deviceModel)
    {
        // Devolvemos las reparaciones con el precio del pivote
        return response()->json($deviceModel->repairTypes);
    }
}