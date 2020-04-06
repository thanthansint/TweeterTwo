<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    protected $table ='gif';
    protected $primaryKey = 'id';
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function tweet(){
        return $this->belongsTo('App\Tweet');
    }
}
