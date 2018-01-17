<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sport extends Model
{
      protected $table = 'sport';

      public function posts(){
          return $this->hasMany('App\Post','post');
      }

}
