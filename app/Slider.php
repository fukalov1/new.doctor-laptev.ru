<?php

namespace App;
use App\Page;
use App\SliderItem;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function items()
    {
        return $this->hasMany(SliderItem::class);
    }

    public function page()
    {
        return$this->belongsTo(Page::class);
    }

}
