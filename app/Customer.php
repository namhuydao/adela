<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function bills()
    {
        return $this->hasMany(Bill::class,'buyer_id');
    }

    public function billItems()
    {
        return $this->hasManyThrough(BillItem::class,Bill::class,'buyer_id', 'bill_id');
    }
}
