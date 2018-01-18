<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sport extends Model
{
      protected $table = 'sport';

      public function post() {
          $this->hasMany('App\Post');
      }

}
