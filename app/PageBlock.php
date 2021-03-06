<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model
{
    protected $fillable = ['page_id', 'orders', 'header', 'image', 'text', 'type'];

    public function pages()
    {
        return $this->belongsTo(Page::class)->where('page_block.orders', '>', '0')->orderBy('orders');
    }

    public function  micro_blocks()
    {
        return $this->hasMany(MicroBlock::class);
    }

    public function photo_reviews()
    {
        return $this->hasMany(PhotoReview::class);
    }

    public function  photosets()
    {
        return $this->hasMany(Photoset::class);
    }

    public function  sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function  directions()
    {
        return $this->hasMany(Direction::class);
    }

    public function  mail_forms()
    {
        return $this->hasMany(MailForm::class);
    }

}
