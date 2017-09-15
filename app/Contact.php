<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    protected $fillable = [
            'cont_street_number', 'cont_street', 'cont_city', 'cont_state', 'cont_zipcode', 'cont_country', 'cont_phone', 'cont_firstname', 'cont_lastname', 'cont_gender', 'cont_isdefault', 'user_id'
        ];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
