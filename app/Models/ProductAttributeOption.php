<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttribute;

class ProductAttributeOption extends Model
{
    protected $fillable = ['product_attribute_id', 'value', 'color_hex'];

    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id');
    }
}
