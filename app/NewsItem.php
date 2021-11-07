<?php

namespace App;

use App\Page;
use Illuminate\Database\Eloquent\Model;
//use Spatie\Feed\Feedable;
//use Spatie\Feed\FeedItem;
use Carbon\Carbon;

class NewsItem extends Model
{
    public function toFeedItem()
    {
//        return FeedItem::create([
//            'id' => $this->id,
//            'title' => $this->title,
//            'summary' => $this->summary,
//            'updated' => $this->updated_at,
//            'link' => $this->link,
//            'author' => $this->author,
//        ]);
        return [];
    }

    public static function getFeedItems()
    {
        $query =  Page::where('parent_id', config('id_articles'))
            ->select('id', 'title', 'description as summary', 'updated_at', 'url as link', 'id as author')
            ->orderByDesc('created_at')
            ->get();
        return $query;

    }

}
