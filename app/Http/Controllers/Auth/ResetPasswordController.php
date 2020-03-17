<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Page;
use App\PageBlock;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function __construct(Page $page, PageBlock $pageBlock)
    {
        $this->page = $page;
        $this->pageBlock = $pageBlock;
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token = null)
    {
        $data = ['pages'=>collect([])];
        $data['pages'] = $this->page->getMenu();
        $data['postform'] = $this->pageBlock->where('page_id', 1)->where('type',10)->first();
        return view('auth.passwords.reset', $data)->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

}
