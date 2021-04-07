<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function billItems()
    {
        return $this->hasMany(BillItem::class, 'bill_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'buyer_id');
    }

}
