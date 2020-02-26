<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoReviewItem extends Model
{
    protected $fillable = ['photo_review_id','title','text','url','image','image1','image2','orders'];

    public function photo_review() {
        return $this->belongsTo(PhotoReview::class);
    }

}
