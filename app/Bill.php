<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function sales()
    {
        return $this->hasMany(Sale::class, 'bill_id', 'id');
    }
    public function seller()
    {
        return $this->hasOne(User::class, 'id', 'seller_id');
    }
}
