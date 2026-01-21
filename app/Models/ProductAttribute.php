<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = ['name', 'slug'];

    public function options()
    {
        return $this->hasMany(ProductAttributeOption::class);
    }
}
