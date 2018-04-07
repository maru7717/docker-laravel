<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $guarded = ['id'];

    public function session()
    {
      return $this->belongsTo('App\Session');
    }

    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
