<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowRelationship extends Model
{
    protected $table ='FollowRelationship';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
