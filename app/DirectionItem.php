<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectionItem extends Model
{
    protected $fillable = ['direction_id','title','text','url','image','orders'];
}
