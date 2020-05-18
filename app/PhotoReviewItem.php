<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Imagez;

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
        $s = 0;
        $e = 0;
        foreach ($oldReview as $item) {
//            dd($item->image, $this->prepare($item->image), $item->image1, $this->prepare($item->image1), $item->image2, $this->prepare($item->image2));
            if ($this->prepare($item->image) and $this->prepare($item->image1) and $this->prepare($item->image2)) {
                $photoReviewItem->create([
                    'photo_review_id' => $id,
                    'text' => $item->text,
                    'image' => $item->image,
                    'image1' => $item->image1,
                    'image2' => $item->image2,
                    'orders' => $i++,
                ]);
                $s++;
            }
            else {
                $e++;
            }
        }
        echo "Insert $s reviews. Skip $e records\n";
    }

    public function prepare($filename)
    {
        $width = 169;
        $height = 225;

        $file = storage_path('temp/' . $filename) ;
//        dd($file, file_exists($file));
        if (file_exists($file)) {

            //Prepare preview image
                try {
                    $i = Imagez::make($file);
                    $w = $i->width();
                    $h = $i->height();

                    if ($w / $h > $width / $height) {
                        $i->resize(round($height * $w / $h, 0), $height);
                    }
                    else {
                        $i->resize($width, round($width * $h / $w, 0));
                    }

                    if ($h > $height) {
                        $i->resize(round($height * $w / $h, 0), $height);
                        $i->resizeCanvas($width, $height, 'center', false, 'ffffff');
                    }
                    $i->save(public_path('uploads') . '/images/thumbnail/' . $filename, 50, 'jpeg');
                    copy($file, public_path('uploads/images/'.$filename) );
                }
                catch (\Exception $exception) {
                    echo 'Error: '.$exception->getMessage()."\n";
                    return false;
                }
            return true;
        }
        else {
            return false;
        }
    }

}
