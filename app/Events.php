<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //table events
    protected $table = 'events';
    protected $dates = ['date'];

}
