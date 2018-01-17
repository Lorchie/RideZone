<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        protected $table = 'post';
        public function sport()
        {
            return $this->belongsTo('App\Sport', 'sport_id');
        }
}
