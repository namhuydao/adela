<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    public function news()
    {
        return $this->hasMany(Product::class);
    }
}
