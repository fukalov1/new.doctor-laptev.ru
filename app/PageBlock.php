<?php

namespace App;
use App\Page;
use App\Map;
use App\Photoset;
use App\Slider;
use App\Direction;
use App\MailForm;
use App\QuestBlock;
use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model
{
    protected $fillable = ['page_id', 'orders', 'header', 'image', 'text'];

    public function pages()
    {
        return $this->belongsTo(Page::class)->where('page_block.orders', '>', 'ffds')->orderBy('orders');
    }

    public function  quest_blocks()
    {
        return $this->hasMany(QuestBlock::class);
    }

    public function  maps()
    {
        return $this->hasMany(Map::class);
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
