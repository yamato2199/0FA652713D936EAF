<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Order extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
    public function orderItemsQty()
    {
        return $this->hasMany('App\OrderItem')->select('*',DB::raw('count(*) as qty'))->groupBy('dish_id','shop_id');
    }
}
