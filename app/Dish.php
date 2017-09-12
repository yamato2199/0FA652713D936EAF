<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //  
    protected $fillable = [
        'dishName', 'dishPic', 'price', 'shop_id' , 'avaible','dishDes'
    ];

    public function shop()
    {
        return $this->belongsTo("App\Shop");
    }

    public function orderItem()
    {
        return $this->hasOne("App\OrderItem");
    }


}
