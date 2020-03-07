<?php

namespace App\Http\Controllers;
use App\Review;
use Mail;
use App\Page;
use App\PageBlock;
use App\Slider;
use App\SliderItem;
use App\Direction;
use App\DirectionItem;
use App\Photoset;
use App\User;
use App\MailForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class  ReviewController extends Controller
{
    public $bread_crubs;

    public function __construct(Page $page, PageBlock $pageBlock, MailForm $mailForm, Review $review, User $user)
    {
        $this->page = $page;
        $this->pageBlock = $pageBlock;
        $this->review = $review;
        $this->mailForm = $mailForm;
        $this->user = $user;
    }

    public function show(Request $request, $error='')
    {
//dd($error);
        $page = Page::find(config('reviews', 3));
        $template = 'review';
        $data = ['data' => $page];
//        dd($page->id);
        //  баннера для зоны новостей


        $reviews = $this->review
            ->where('hide', false)
            ->orderBy('created_at', 'desc')
            ->paginate(config('count_articles', 10));

        $this->getBeadCrumbs($page->id);

        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['pages'] = $this->page->getMenu();
        $data['reviews'] = $reviews;
        $data['error'] = $error;
        $data['request'] = $request;
        $data['message'] = null;
        $page_blocks = $this->pageBlock->where('page_id', $page->id)->where('orders','>',0)->orderBy('orders')->get();
        $data['page_blocks'] = $page_blocks;
        return view($template, $data);
    }


    private function getBeadCrumbs($id)
    {
        $page = Page::find($id);
//        dd($id, $page);
        $this->bread_crubs = " <a href='/{$page->url}'>".preg_replace('/\<br\/\>/','',$page->name)."</a> / ".$this->bread_crubs;

        if ($page->parent_id>0) {
            $this->getBeadCrumbs($page->parent_id);
        }
    }

    public function save(Request $request)
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            return $this->show(request(), 'failed');
        }
        else {
            try {
                $this->review->createReview($request);
//                Log::channel('sitelog')->info('Send mail from ' . config('email') . '  name: ' . request('fio') . '  email: ' . request('email'));
                return $this->showResult();
            } catch (\Exception $error) {
//                Log::channel('sitelog')->info('Error! Sender: '.config('email').'  Receiver: '. $mailform->sender.' User:' . request('email') . ' name: ' . request('fio') . ' ' . request('direction').' Error: '.$error->getMessage());
                echo $error->getMessage();
                return $this->show(request(), request('type'), 'error');
            }
        }
    }

    private function showResult() {
        $page = Page::find(config('reviews', 3));
        $template = 'review';
        $data = ['data' => $page];
//        dd($page->id);
        //  баннера для зоны новостей


        $reviews = $this->review
            ->where('hide', false)
            ->orderBy('created_at', 'desc')
            ->paginate(config('count_articles', 10));


        $this->getBeadCrumbs($page->id);

        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['pages'] = $this->page->getMenu();
        $data['reviews'] = $reviews;
        $data['questions'] = collect([]);
        $data['type'] = collect([]);
        $data['error'] = '';
        $data['request'] = collect([]);
        $data['message'] = 'Ваша отзыв успешно отправлен! После проверки он будет опубликован. Спасибо!';
        $page_blocks = $this->pageBlock->where('page_id', $page->id)->where('orders','>',0)->orderBy('orders')->get();
        $data['page_blocks'] = $page_blocks;
//dd($data);
        return view('survey', $data);
    }

    private function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }



}
