<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DeviceModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'brand_id', 'name', 'image_path'];

    /**
     * Get the category that owns the DeviceModel.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the brand that owns the DeviceModel.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * The repair types that belong to the DeviceModel.
     */
    public function repairTypes(): BelongsToMany
    {
        return $this->belongsToMany(RepairType::class, 'device_model_repair_type')
                    ->withPivot('price', 'time_estimate_minutes') // Incluye los campos extra de la tabla pivote
                    ->withTimestamps();
    }
}