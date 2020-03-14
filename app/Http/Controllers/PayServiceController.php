<?php

namespace App\Http\Controllers;
use App\City;
use App\Code;
use App\Question;
use App\QuestBlock;
use App\SubDomain;
use Mail;
use App\Page;
use App\PageBlock;
use App\PayService;
use App\User;
use App\MailForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PayServiceController extends Controller
{
    public $bread_crubs;

    public function __construct(Page $page, PageBlock $pageBlock, MailForm $mailForm,
                                City $city, Question $question, User $user,
                                PayService $payService, Code $code)
    {
        $this->page = $page;
        $this->pageBlock = $pageBlock;
        $this->city = $city;
        $this->mailForm = $mailForm;
        $this->question = $question;
        $this->user = $user;
        $this->payService = $payService;
        $this->code = $code;
    }

    public function show(Request $request)
    {
//dd($error);
        $page = Page::find(config('payservice_id', 3));
        $template = 'payservice';
        $data = ['data' => $page];
//        dd($page->id);
        $error = '';

        $this->getBeadCrumbs($page->id);

        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['pages'] = $this->page->getMenu();
        $data['error'] = $error;
        $data['request'] = $request;
        $data['payservice'] = $this->payService->get();
        $data['message'] = null;
        $page_blocks = $this->pageBlock->where('page_id', $page->id)->where('orders','>',0)->orderBy('orders')->get();
        $data['page_blocks'] = $page_blocks;
        return view($template, $data);
    }

    public function showPrivate(Request $request)
    {
        $page = Page::find(config('payservice_id', 3));
        $template = 'private';
        $data = ['data' => $page];
//        dd($page->id);
        $error = '';

        $this->getBeadCrumbs($page->id);

        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['pages'] = $this->page->getMenu();
        $data['error'] = $error;
        $data['payservice'] = $this->payService->find($request->id);
        $data['message'] = null;
        $data['id'] = $request->id;
        $data['code'] = $request->code;
//        dd($this->payService->find($request->id));
        return view($template, $data);
    }

    public function showService(Request $request)
    {
//dd($error);
        $page = Page::find(config('payservice_id', 3));
        $template = 'show_payservice';
        $data = ['data' => $page];
//        dd($page->id);
        $error = '';

        $this->getBeadCrumbs($page->id);

        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['pages'] = $this->page->getMenu();
        $data['error'] = $error;
        $data['request'] = $request;
        $data['payservice'] = $this->payService->get();
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
            return $this->show(request(), request('type'), 'failed');
        }
        else {
            try {
                $this->user->createUser($request);
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
        $page = Page::find(3);
        $template = 'survey';
        $data = ['data' => $page];
//        dd($page->id);
        //  баннера для зоны новостей


        $cities = $this->city
            ->where('show', true)
            ->orderBy('date')
            ->get();

        $this->getBeadCrumbs($page->id);

        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['pages'] = $this->page->getMenu();
        $data['cities'] = $cities;
        $data['questions'] = collect([]);
        $data['type'] = collect([]);
        $data['error'] = '';
        $data['request'] = collect([]);
        $data['message'] = 'Ваша анкета успешно зарегистрирована!';
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


    public function getData(Request $request)
    {
        $id = $request->id;
        $code = $request->code;
        return json_encode($this->payService->find($id)->with(['group_code' => function($q) use ($code)  {
            $q->with(['codes' => function ($query) use ($code)  {
                $query->where('code',$code);
            }]);
        }])->first());
    }

    public function checkData(Request $request)
    {
        $id = $request->id;
        $code = $request->code;

        $this->code->where('group_code_id',  $id)->where('code', $code)->increment('count');
//        $t = Code::where('group_code_id',  $id)->where('code', $code.'888')->update(['count' => 100]);
//        dd($id, $code, $t);
//        dd($codes);
//        if ($codes) {
//            $count = $codes->count+1;
//            dd($count, $code);
//            $this->code->where(['group_code_id' => $id, 'code' => $code], ['count' => $count]);
            return json_encode(['success' => true]);
//        }
//        else {
//            return json_encode(['success' => false]);
//        }
    }

    public function getFile($file)
    {
        try {
            return Storage::disk('videoshow')->get($file);
        } catch (\Exception $e) {
            return 'Not found '.$e->getMessage();
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

}
