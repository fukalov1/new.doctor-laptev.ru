<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    public function data2Page() {
        $parent_id = 9;
        $pages = new Page();
        $pageBlocks = new PageBlock();
        foreach ($this->all() as $item) {
            $page = $pages->create([
                'anons' => $item->anons,
                'name' => $item->name,
                'parent_id' => $parent_id,
                'title' => $item->title,
                'description' => $item->description,
                'keywords' => $item->keywords,
                'order' => $item->orders,
                'image' => $item->image,
            ]);
            $pageBlocks->create([
                'page_id' => $page->id,
                'header' => $item->title,
                'text' => $item->text,
                'image' => $item->image,
                'orders' => 1,
            ]);
        }
    }

}
