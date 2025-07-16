<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DeviceModelController;
use App\Http\Controllers\Admin\RepairTypeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Api\V1\QuoteApiController;
use Illuminate\Support\Facades\Auth;
use App\Models\Quote;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController; 
use App\Http\Controllers\Admin\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $quotes = Auth::user()
        ->quotes()
        ->with(['deviceModel.brand', 'repairType'])
        ->latest()
        ->get();

    return view('dashboard', compact('quotes'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
})->name('sobre-nosotros');

// Rutas de Administrador
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        // Obtenemos TODAS las cotizaciones de TODOS los usuarios
        $quotes = Quote::with(['user', 'deviceModel.brand', 'repairType'])->latest()->get();
        return view('admin.dashboard', compact('quotes'));
    })->name('dashboard');

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('device-models', DeviceModelController::class); 
    Route::resource('repair-types', RepairTypeController::class); 

    Route::post('device-models/{device_model}/repairs', [DeviceModelController::class, 'attachRepair'])->name('device-models.repairs.attach');

    Route::delete('device-models/{device_model}/repairs/{repair_type}', [DeviceModelController::class, 'detachRepair'])->name('device-models.repairs.detach');

    Route::post('/quotes/{quote}/complete', [AdminQuoteController::class, 'complete'])->name('quotes.complete');

    Route::delete('/quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');

    Route::resource('users', UserController::class);
});
// RUTA PARA LA PÁGINA DE COTIZACIÓN
Route::get('/cotizacion', [QuoteController::class, 'create'])->name('quote.create');

// INICIO: Rutas API para el formulario de cotización
Route::prefix('api/v1')->name('api.v1.')->group(function () {
    Route::get('/brands-by-category/{category}', [QuoteApiController::class, 'getBrandsByCategory'])->name('brands-by-category');
    Route::get('/models-by-brand/{brand}', [QuoteApiController::class, 'getModelsByBrand'])->name('models-by-brand');
    Route::get('/repairs-by-model/{deviceModel}', [QuoteApiController::class, 'getRepairsByModel'])->name('repairs-by-model');
});
// FIN: Rutas API
//Guardar cotizaciones
Route::post('/solicitud-personalizada', [QuoteController::class, 'storeCustom'])->middleware('auth')->name('quote.store.custom');
Route::post('/cotizacion', [QuoteController::class, 'store'])->middleware('auth')->name('quote.store');
Route::delete('/cotizacion/{quote}', [QuoteController::class, 'destroy'])->middleware('auth')->name('quote.destroy');