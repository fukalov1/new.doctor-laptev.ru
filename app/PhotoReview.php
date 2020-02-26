<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoReview extends Model
{
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function items()
    {
        return $this->hasMany(PhotoReviewItem::class);
    }

}
