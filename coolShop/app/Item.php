<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name'];

    protected $hidden = [
      'questions',
    ];

    public function questions(){
      return $this->hasMany('App\Question');
    }
}
