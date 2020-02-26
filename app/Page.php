<?php

namespace App;
use App\PageBlock;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = ['anons','parent_id','title','description','keywords','name','url','image', 'order'];

    public function sub_pages()
    {
        return $this->hasMany(Page::class,'parent_id','id')->where('order', '>', 0)->orderBy('order');
    }

    public function page_blocks()
    {
        return $this->hasMany(PageBlock::class)->orderBy('orders');
    }

    public function getMenu()
    {
        return Page::where('parent_id', 0)
            ->where('order', '>', 0)
            ->get()->sortBy('order');
    }

    public function getMainArticle() {

        return Page::where('parent_id', 9)
            ->where('order', '>', 0)
            ->take(4)
            ->orderBy('id', 'desc')
            ->get();

    }

    public function getMainPhotoReview() {

        return PageBlock::where('page_id', 18)
            ->where('orders', '>', 0)
            ->take(6)
            ->orderBy('id', 'desc')
            ->get();

    }


}
