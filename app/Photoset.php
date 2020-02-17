<?php

namespace App;
use App\Page;
use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Photoset extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function page()
    {
        return$this->belongsTo(Page::class);
    }

}
