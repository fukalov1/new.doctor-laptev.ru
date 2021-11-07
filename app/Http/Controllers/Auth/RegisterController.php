<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\VerifyMail;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Page;
use App\PageBlock;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::MESSAGE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Page $page, PageBlock $pageBlock)
    {
        $this->page = $page;
        $this->pageBlock = $pageBlock;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'verify_token' => Str::random(),
            'password' => Hash::make($data['password']),
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    public function showRegistrationForm()
    {
        $data = ['pages'=>collect([])];
        $data['pages'] = $this->page->getMenu();
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
        return view('auth.register', $data);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('login')
            ->with('success', 'Подтвердите свой email, перейдя по ссылке');
    }


}
