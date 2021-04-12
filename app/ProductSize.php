<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_sizes';
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
