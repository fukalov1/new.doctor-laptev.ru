<?php

namespace App\Http\Controllers;
use App\NewsItem;
use App\QuestBlock;
use App\SubDomain;
use Mail;
use App\Page;
use App\PageBlock;
use App\Slider;
use App\SliderItem;
use App\Direction;
use App\DirectionItem;
use App\Photoset;
use App\MailForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public $bread_crubs;

    public function __construct(Page $page, PageBlock $pageBlock, MailForm $mailForm, NewsItem $newsItem)
    {
        $this->page = $page;
        $this->pageBlock = $pageBlock;
        $this->mailForm = $mailForm;
        $this->newsItem = $newsItem;
    }

    public function showAll()
    {
        $id_articles = config('id_articles');
        $page = Page::find($id_articles);
        $location = '';
        $template = 'page';
        $data = ['data' => $page];
//        dd($page->id);
        //  баннера для зоны новостей

        $articles = $this->page->where('parent_id',$id_articles)->orderBy('created_at', 'desc')->paginate(config('count_articles'));

        $this->getBeadCrumbs($page->id);

        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['pages'] = $this->page->getMenu();
        $data['articles'] = $articles;
        $data['cities'] = collect([]);
        $data['photo_reviews'] = collect([]);
        $page_blocks = $this->pageBlock->where('page_id', $page->id)->where('orders','>',0)->orderBy('orders')->get();
        $data['page_blocks'] = $page_blocks;
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
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

    public function sendFormData($id)
    {
        if ($id) {

            try {
                $mailform = MailForm::find($id);
                $direction = request('direction');

                $data = [
                    'ip' => $this->getIp(),
                    'url' =>  url()->current(),
                    'email' => request('email'),
                    'name' => request('name'),
                    'fio' => request('fio'),
                    'email' => request('email'),
                    'phone' => request('phone'),
                    'direction' => request('direction'),
                    'message' => request('message' . $id),
                    'to' => $mailform->sender
                ];


                Log::channel('sitelog')->info('Send mail from ' . config('email') . '  name: ' . request('fio') . '  email: ' . request('email'));

                Mail::send('emails.sendform', ['data' => $data], function ($message) use ($data) {
                    $emails = explode(',',$data['to']);
                    $message->from(config('email'), ' ', config('company_name'));
                    $message->to($emails)->subject('Заказ сметы с taktilnaya-plitka.ru. ');
//                    $message->to($data['to'], 'admin')->subject('Заказ сметы с taktilnaya-plitka.ru. ');
                });
                $data = ['success' => true, 'result' => 'Спасибо за Ваше обращение. <br/><br/>Сообщение успешно отправлено администратору.<br/><br/> В ближайшее время Вы получите ответ.'];
            }
            catch (\Exception $error) {
//                dd($error->message);
//                dd($data);
                $data = ['success' => false, 'result' => 'Ошибка. <br/><br/>Сообщение не было отправлено администратору.<br/>'];
                Log::channel('sitelog')->info('Error! Sender: '.config('email').'  Receiver: '. $mailform->sender.' User:' . request('email') . ' name: ' . request('fio') . ' ' . request('direction').' Error: '.$error->getMessage());
            }
        }
        else {
            $data = ['result' => 'Данные не приняты'];
        }
        return json_encode($data);
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

    public function sendQuestData($id)
    {
        if ($id) {

            $quest_block = $this->questBlock->find($id);

            $question = new Question();
            $question->quest_block_id = $id;
            $question->sort = 1;
            $question->hide = 1;
            $question->quest = request('message'.$id);
            $question->response = '';
            $question->email = request('email');
            $question->name = request('fio');
            $question->save();

            $data = [
                'email' => request('email'),
                'name' => request('name'),
                'message' => request('message'.$id),
                'to' => $quest_block->email,
                'page' => $quest_block->page->name,
                'id' => $question->id
            ];

            // Уведомление клиенту
            Mail::send('emails.sendform', ['data' => $data], function ($m) use ($data) {
                $m->from(config('email'), ' ', config('company_name'));

                $m->to($data['to'], 'Администратору')->subject('Вопрос № '.$data['id'].' для центра трудовых ресурсов. Страница '.$data['page']);
            });
            // работнику центра
            Mail::send('emails.sendform', ['data' => $data], function ($m) use ($data) {
                $m->from(config('email'), ' ', config('company_name'));

                $m->to($data['email'], 'Администратору')->subject('Вопрос № '.$data['id'].' c сайта. Страница '.$data['page']);
            });
            $data = ['result' => 'Спасибо, Ваше письмо № '.$question->id.' получено. <br/><br/> Ожидайте ответа в ближайшее время.'];



        }
        else {
            $data = ['result' => 'Данные не приняты'];
        }
        return json_encode($data);
    }

    public function searchPages(Request $request) {
        $word = $request['word'];
        if (isset($word)) {

            $data['pages'] = $this->page->getMenu();
            $data['bread_crumbs'] = '<a href="/">Главная</a> / Результат поиска по фразе: "'.$word.'"';

//            $result = collect([]);

            $result = $this->page
                ->join('page_blocks','pages.id','page_blocks.page_id')
                ->where('pages.name','LIKE',"%$word%")
                ->orWhere('page_blocks.text','LIKE',"%$word%")->paginate(10);

            $data['result'] = $result;

            return view('search', $data);

        }
        else {
            redirect('/');
        }

    }

    public function getFeeds()
    {
        $items =  $this->newsItem->getFeedItems();
        return response()
            ->view('feeds.news', ['updated' => $items->first()->updated_at, 'items' => $items])
            ->header('Content-type', 'text/xml');
    }
}
