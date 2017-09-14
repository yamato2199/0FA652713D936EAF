<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopSell extends Model
{
    protected $fillable=['transaction_id', 'shop_id'];

    public function shop(){
        return $this->belongsTo('App\Shop');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction');
    }


}
