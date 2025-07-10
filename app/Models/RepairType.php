<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RepairType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'base_price'];

    /**
     * The device models that belong to the RepairType.
     */
    public function deviceModels(): BelongsToMany
    {
        return $this->belongsToMany(DeviceModel::class, 'device_model_repair_type')
                    ->withPivot('price', 'time_estimate_minutes') // Incluye los campos extra de la tabla pivote
                    ->withTimestamps();
    }
}