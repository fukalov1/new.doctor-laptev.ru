<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Page;
use App\PageBlock;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Page $page, PageBlock $pageBlock)
    {
        $this->page = $page;
        $this->pageBlock = $pageBlock;
//        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $data = ['pages'=>collect([])];
        $data['pages'] = $this->page->getMenu();
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
        return view('auth.login', $data);
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->email_verified_at) {
            $this->guard()->logout();
            return back()->with('error', 'Вы не подтвердили адрес электронной почты. Вход невозможен.');
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

}
