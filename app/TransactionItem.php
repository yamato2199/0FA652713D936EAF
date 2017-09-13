<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable=['transaction_id', 'dish_name', 'dish_price'];

    public function transaction(){
        return $this->belongsTo('App\Transaction');
    }

}
