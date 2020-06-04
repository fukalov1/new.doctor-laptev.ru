<?php

namespace App;

use App\Page;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Carbon\Carbon;

class NewsItem extends Model  implements Feedable
{
    public function toFeedItem()
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'updated' => $this->updated_at,
            'link' => $this->link,
            'author' => $this->author,
        ]);
    }

    public static function getFeedItems()
    {
        $query =  Page::where('parent_id', config('id_articles'))
            ->select('id', 'title', 'description as summary', 'updated_at', 'url as link', 'id as author')->get()->toArray();

        $items = collect(); // create new collection

        foreach ($query as $key => $value) {
            if ($value['title']=='')
                continue;
            $query[$key]['created_at'] = Carbon::parse($value['updated_at'])->format('dS F Y H:i a');
            $query[$key]['link'] = 'https://doctor-laptev.ru/' . $value['link'];
            $query[$key]['author'] = 'Лаптев А.В.';



            $instance = new static; // create new NewsItem model class

            foreach($value as $attribute => $_value) {
                $instance->{$attribute} = $_value; // copy available attribute/column and its value
            }

            $instance->exists = true; // tell this model is already exists, forcely
            $items[$key] = $instance; // assign this model to the collection
        }

        return $items;

    }

}
