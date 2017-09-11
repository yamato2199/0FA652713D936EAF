<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function dish()
    {
        return $this->belongsTo('App\Dish');
    }
}
