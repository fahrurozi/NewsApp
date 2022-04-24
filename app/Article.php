<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function users(){
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    
}
