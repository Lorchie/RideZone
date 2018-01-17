<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';

    public function sports(){
        return $this->belongsTo('App\Sport','sport');
    }
}
