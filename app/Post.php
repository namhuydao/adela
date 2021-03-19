<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'products';
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
