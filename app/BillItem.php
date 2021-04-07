<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    public function bills()
    {
        return $this->belongsTo(Bill::class,'bill_id');
    }

}
