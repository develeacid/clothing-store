<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'materials',
        'care_instructions',
        'origin',
        'features',
        'gender',
        'type',
        'base_price',
        'is_outlet',
        'is_featured',
        'is_online_exclusive',
        'is_active'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'features' => 'array',
            'is_outlet' => 'boolean',
            'is_featured' => 'boolean',
            'is_online_exclusive' => 'boolean',
            'is_active' => 'boolean',
            'base_price' => 'decimal:2',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true)->latest();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
