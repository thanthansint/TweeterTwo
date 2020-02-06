<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowRelationship extends Model
{
    protected $table ='followRelationship';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
