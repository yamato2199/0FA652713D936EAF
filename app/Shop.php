<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable=['id', 'shop_name', 'shop_pic', 'shop_street_number', 'shop_street', 'shop_city', 'shop_state', 'shop_zipcode', 'shop_country', 'user_id'];

    public function dishs()
    {
        
        return $this->hasMany('App\Dish');
    }

    public function owner(){
        //return $this->belongsTo(User::class);
    }
}
