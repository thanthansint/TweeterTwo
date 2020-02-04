<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='Like';
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function tweet(){
        return $this->belongsTo('App\Tweet');
    }
}
