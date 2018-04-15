<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Sport extends Model
{
      protected $table = 'sport';

    public function post() {
        $this->hasMany('App\Post');
    }

}
