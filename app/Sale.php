<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function sale_bill()
    {
        return $this->hasOne(Bill::class, 'id', 'bill_id')->where('is_billed', 'yes')->where('bill_type', 'sale');
    }
}
