<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table = 'notifications';
    
    protected  $fillable = ['receiver_id','sender_id','title','body','read'];


    public function notification()
    {
        return $this->belongsTo('App\Notification');
    }


    public function sender()
    {
        return $this->belongsTo('App\User');
    }
}
