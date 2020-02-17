<?php

namespace App;
use App\Photoset;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['photoset_id','name','text','image','orders'];


    public function photosets()
    {
        return $this->belongsTo(Photoset::class);
    }
}
