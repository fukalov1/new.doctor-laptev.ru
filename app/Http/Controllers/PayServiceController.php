<?php

namespace App\Http\Controllers;
use App\City;
use App\Code;
use App\GroupCode;
use App\LogPayment;
use App\Question;
use App\QuestBlock;
//use App\Lib\Logs\LogService;
use App\SubDomain;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;
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
    protected $logger;
    const  LOG_TYPE = '[PAYMENTS]';

    public function __construct(Page $page, PageBlock $pageBlock, MailForm $mailForm,
                                City $city, Question $question, User $user,
                                PayService $payService, Code $code, LogPayment $logPayment)
    {
//        $this->logger = new LogService('site', self::LOG_TYPE);
        $this->page = $page;
        $this->pageBlock = $pageBlock;
        $this->city = $city;
        $this->mailForm = $mailForm;
        $this->question = $question;
        $this->user = $user;
        $this->payService = $payService;
        $this->code = $code;
        $this->logPayment = $logPayment;
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
        $data['payservice'] = $this->payService->getActive();
        $data['message'] = null;
        $page_blocks = $this->pageBlock->where('page_id', $page->id)->where('orders','>',0)->orderBy('orders')->get();
        $data['page_blocks'] = $page_blocks;
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
        return view($template, $data);
    }

    public function showArchive(Request $request)
    {
//dd($error);
        $page = Page::find(config('payservice_id', 3));
        $template = 'payservice_archive';
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
        $data['payservice'] = $this->payService->getArchive();
        $data['message'] = null;
        $page_blocks = $this->pageBlock->where('page_id', $page->id)->where('orders','>',0)->orderBy('orders')->get();
        $data['page_blocks'] = $page_blocks;
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
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

        $code = $request->code;
        $valid_code = $this->payService->where('id', $request->id)->first();
        if ($valid_code->codes->where('code', $request->code)->where('count','<', $valid_code->show_count)->count()==0) {

            $payservice = collect(new PayService());
            $payservice->id = 0;
            $payservice->name = '';
            $payservice->private_text = '';
            $payservice->show_private = false;
            $payservice->price = '';
            $data['payservice'] = $payservice;
        }
        else {
            $data['payservice'] = $this->payService->find($request->id);
        }
        $data['message'] = null;
        $data['id'] = $request->id;
        $data['code'] = $request->code;
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
//        dd($this->payService->find($request->id));
        return view($template, $data);
    }

    public function showService(Request $request, $id)
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
        $payservice= $this->payService->find($id);
        $data['payservice'] = $payservice;
        $data['message'] = null;
        $time = time();
        $data['time'] = $time;

        $receipt = json_encode([
            "sno" => "usn_income",
            "items" =>
                [
                    [
                        "name" => 'Психологическая услуга',
                        "quantity" => 1,
                        "sum" => $payservice->price,
                        "payment_method" => "full_payment",
                        "payment_object" => "service",
                        "tax" => "none"
                    ]
                ]
        ]);

//        $receipt_urlencode = urlencode($receipt);
        $receipt_urlencode = '%7B%22sno%22%3A%22usn_income%22%2C%22items%22%3A%5B%7B%22name%22%3A%22%5Cu041f%5Cu0441%5Cu0438%5Cu0445%5Cu043e%5Cu043b%5Cu043e%5Cu0433%5Cu0438%5Cu0447%5Cu0435%5Cu0441%5Cu043a%5Cu0430%5Cu044f%20%5Cu0443%5Cu0441%5Cu043b%5Cu0443%5Cu0433%5Cu0430%22%2C%22quantity%22%3A1%2C%22sum%22%3A1%2C%22payment_method%22%3A%22full_payment%22%2C%22payment_object%22%3A%22service%22%2C%22tax%22%3A%22none%22%7D%5D%7D';


//        dd(env('ROBO_LOGIN'),round($payservice->price),$time,env('ROBO_PASS1'),Auth::user()->email,$id);
        $data['sign'] = md5(env('ROBO_LOGIN').":".round($payservice->price).":$time:$receipt:".env('ROBO_PASS1').":shp_email=".Auth::user()->email.":shp_payid=".$id);
//        dd('Sign: '.$data['sign'].'Data for sign: '.env('ROBO_LOGIN').":".round($payservice->price).":$time:".env('ROBO_PASS1').":shp_email=".Auth::user()->email.":shp_payid=".$id);
        Log::info('Sign: '.$data['sign'].'Data for sign: '.env('ROBO_LOGIN').":".round($payservice->price).":$time:".env('ROBO_PASS1').":shp_email=".Auth::user()->email.":shp_payid=".$id);
//        $this->logger->setText('Sign: '.$data['sign'].' Data for sign: '.env('ROBO_LOGIN').":".round($payservice->price).":$time:".env('ROBO_PASS1').":shp_email=".Auth::user()->email.":shp_payid=".$id)->logError();
//        $data['sign'] = md5(env('ROBO_LOGIN').":".round($payservice->price,0).":$time:".env('ROBO_PASS1').":shp_email=".Auth::user()->email.":shp_payid=".$id);

        $data['receipt'] = $receipt_urlencode;

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
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
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

        $payService = $this->payService->where('id', $id)->with(['group_code' => function($q) use ($code)  {
            $q->with(['codes' => function ($query) use ($code)  {
                $query->where('code',$code);
            }]);
        }])->first();
        return json_encode($payService);
    }

    public function checkData(Request $request)
    {
        $id = $request->id;
        $code = $request->code;

        try {
            $group_code = GroupCode::where('pay_service_id', $id)->first();
            $client_code = $this->code->where('group_code_id', $group_code->id)->where('code', $code)->first();
            $count = $client_code->count+1;

            $client_code->update([
                'client'=> Auth::user()->name,
                'phone'=> Auth::user()->phone,
                'email'=> Auth::user()->email,
                'count' => $count
                ]);
            return json_encode(['success' => true]);
        }
        catch (\Exception $exception) {
            return json_encode(['success' => false]);
        }
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

    public function paySuccess(Request $request)
    {
        // регистрационная информация (пароль #1)
// registration info (password #1)
        $pass1 = env('ROBO_PASS1');

// чтение параметров
// read parameters
        $out_summ = $request->OutSum;
        $inv_id = $request->InvId;
        $shp_payid = $request->shp_payid;
        $shp_email = $request->shp_email;
        $crc = $request->SignatureValue;

        $crc = strtoupper($crc);

        $my_crc = strtoupper(md5("$out_summ:$inv_id:$pass1:shp_email=$shp_email:shp_payid=$shp_payid"));

//        print "$crc=".md5("$out_summ:$inv_id:$pass1:shp_email:$shp_email:shp_payid=$shp_payid")."=$out_summ:$inv_id:$pass1:shp_email=$shp_email:shp_payid=$shp_payid<br/>";

        // проверка корректности подписи
        if ($my_crc != $crc)
        {
            $result  = "Проверка подписи при оплате услуги № $inv_id не прошла. Платеж отклонен.";

            $data = $this->prepareData();
            $data['message'] = $result;
            $data['payservice'] = null;

            return view('payment', $data);

        }
        else {

            $user = $this->user->where('email', $shp_email)->first();
            $code = null;
            if($user) {
                $pay_service = $this->payService->find($shp_payid);

//                $this->noticePay($pay_service, $code, $inv_id, $out_summ, $shp_email);
                $data = $this->prepareData();
                $data['message'] = "Оплата услуги № $inv_id на сумму $out_summ успешно совершена";
                $data['payservice'] = null;

                return view('payment', $data);
            }
            else {
                $result  = "Клиент с email $shp_email не найден.";

                $data = $this->prepareData();
                $data['message'] = $result;
                $data['payservice'] = null;

                return view('payment', $data);

            }
        }
    }


    public function payResult(Request $request)
    {
// регистрационная информация (пароль #2)
        $pass2 = env('ROBO_PASS2');

//установка текущего времени
        $date = date('Y-m-d h:i:s', time());

// чтение параметров
        $out_summ = $request->OutSum;
        $inv_id = $request->InvId;
        $shp_payid = $request->shp_payid;
        $shp_email = $request->shp_email;
        $crc = $request->SignatureValue;

        $crc = strtoupper($crc);

        $my_crc = strtoupper(md5("$out_summ:$inv_id:$pass2:shp_email=$shp_email:shp_payid=$shp_payid"));
        Log::info("SIGN: $crc Verify sign: $my_crc DATA for sign: $out_summ:$inv_id:$pass2:shp_email=$shp_email:shp_payid=$shp_payid");
//        dd("$out_summ:$inv_id:$pass2:shp_email=$shp_email:shp_payid=$shp_payid");

// проверка корректности подписи
        if ($my_crc !=$crc)
        {
            $result  = "Проверка подписи при оплате услуги № $inv_id не прошла. Платеж отклонен.";;
            $data = $this->prepareData();
            $data['message'] = $result;
            $data['payservice'] = null;
            return view('payment', $data);
        }
        else {
// признак успешно проведенной операции
            $user = $this->user->where('email', $shp_email)->first();
            $code = null;
            if($user) {
                $pay_service = $this->payService->find($shp_payid);

                $code = $this->code
                    ->where('group_code_id', $pay_service->group_code_id)
                    ->where('free', 1)
                    ->first();

                $code_nmbr = 'будет выдан администратором';
                if($code===null) {
                    $code_id = '0';
                }
                else {
                    $code_nmbr = $code->code;
                    $code_id = $code->id;
                    Code::find($code_id)
                        ->update([
                                'free' => 0,
                                'client' => $user->name,
                                'phone' => $user->phone,
                                'email' => $user->email,
                                'date' => date('Y-m-d h:i:s', time())
                            ]
                        );

                }

                $this->logPayment->updateOrCreate(
                    [
                        'inv_id' => $inv_id,
                        'pay_service_id' => $shp_payid,
                        'user_id' => $user->id
                    ],
                    [
                        'sum' => $out_summ,
                        'success' => true,
                        'comment' => $code_nmbr,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );

                Log::channel('sitelog')->info('Success payment No ' . $inv_id . '  Sum: ' . $out_summ . ' User email: ' . $shp_email." ID Code: ".$code_id." Code: ".$code_nmbr);

//                $this->noticePay($pay_service, $code_nmbr, $inv_id, $out_summ, $shp_email);
                $data = $this->prepareData();
                $data['message'] = "Оплата услуги № $inv_id на сумму $out_summ успешно совершена";
//                $data['payservice'] = null;

                $this->noticePay($pay_service, $code_nmbr, $inv_id, $out_summ, $shp_email);
            }

            $result = "Услуга успешно оплачена. № $inv_id";
            $data = $this->prepareData();
            $data['message'] = $result;
            $data['payservice'] = null;

            return \response('OK'.$inv_id);
        }
    }

    public function payFail(Request $request)
    {
        $inv_id = $request->InvId;
        $result  = "Вы отказались от оплаты регистации анкеты № $inv_id";

        $data = $this->prepareData();
        $data['message'] = $result;
        $data['payservice'] = null;

        return view('payment', $data);

    }

    private function noticePay($pay_service, $code, $inv_id, $sum, $email)
    {
        $user = $this->user->where('email', $email)->first();
        Log::channel('sitelog')->info('Payment No ' . $inv_id . '  Sum: ' . $sum . ' User email: ' . $email);

        $data = [];
        $data['inv_id'] = $inv_id;
        $data['sum'] = $sum;
        $data['pay_service'] = $pay_service;
        $data['code'] = $code;

        $data['user'] = $user;
        try {
            Mail::send('emails.pay_notice', ['data' => $data], function ($message) use ($user) {
//                    $emails = explode(',',$user->email);
                $message->from(config('email'));
                $message->cc(config('email'));
                $message->to($user->email)->subject('Уведомление об оплате услуги');
//                    $message->to($data['to'], 'admin')->subject('Заказ сметы с taktilnaya-plitka.ru. ');
            });
        }
        catch (\Throwable $error) {
//                dd($data);
            Log::channel('sitelog')->info('Failed sending payment No ' . $inv_id . '  Sum: ' . $sum . ' User email: ' . $email." Error: ".$error->getMessage());
        }
    }

    private function prepareData() {
        $page = Page::find(3);
        $data = ['data' => $page];

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
//        $data['questions'] = $questions;
//        $data['type'] = $type;
//        $data['error'] = $error;
//        $data['request'] = $request;
        $page_blocks = $this->pageBlock->where('page_id', $page->id)->where('orders','>',0)->orderBy('orders')->get();
        $data['page_blocks'] = $page_blocks;
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
        return $data;
    }
}
