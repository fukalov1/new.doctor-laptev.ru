<?php

namespace App\Http\Controllers;

use App\PageBlock;
use App\User;
use App\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Page $page, User $user, PageBlock $pageBlock)
    {
        $this->page = $page;
        $this->user = $user;
        $this->pageBlock = $pageBlock;
    }


    public function index()
    {
        $this->show();
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = [
            'pages' => $this->page->getMenu(),
            'data' => $this->page->find(1),
            'page_blocks' => [],
            'articles' => [],
            'user' => $this->user->find(Auth::id()),
            'postform' => $this->pageBlock->where('page_id', 1)->where('type',10)->first()
        ];
//        dd($data);
        return view('auth.profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->user->find(Auth::id())->update(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'skype' => $request->skype,
                'city' => $request->city
            ]);
        return  redirect('user-profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
