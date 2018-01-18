<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discipline extends Model
{
    public function post() {
        $this->hasMany('App\Post');
    }
}
