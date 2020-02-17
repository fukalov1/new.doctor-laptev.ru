<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    public function items()
    {
        return $this->hasMany(DirectionItem::class);
    }

    public function page()
    {
        return$this->belongsTo(Page::class);
    }
}
