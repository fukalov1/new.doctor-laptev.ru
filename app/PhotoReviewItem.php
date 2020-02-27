<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoReviewItem extends Model
{
    protected $fillable = ['photo_review_id','title','text','url','image','image1','image2','orders'];

    public function photo_review() {
        return $this->belongsTo(PhotoReview::class);
    }

    public function importReviews()
    {
        $id = 1;

        $oldReview = OldReview::get();
        $photoReviewItem = new PhotoReviewItem();
        $i = 1;
        foreach ($oldReview as $item) {
            $photoReviewItem->create([
                'photo_review_id' => $id,
                'text' => $item->text,
                'image' => $item->image,
                'image1' => $item->image1,
                'image2' => $item->image2,
                'orders' => $i++,
            ]);
        }
    }

}
