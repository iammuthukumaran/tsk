<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_id', 'buyer_id', 'quantity', 'buying_price', 'total', 'buy_date'];

    public function product()
    {
        return $this->hasOne(Todo::class, 'id', 'product_id');
    }
    public function buyer()
    {
        return $this->hasOne(User::class, 'id', 'buyer_id');
    }
}
