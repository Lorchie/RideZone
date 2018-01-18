<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class post extends Model
{
    protected $table = 'post';

    public function sports(){
        return $this->belongsTo('App\Sport','sport_id');
    }

    public function discipline(){
        return $this->belongsTo('App\discipline','discipline_id');
    }
}
