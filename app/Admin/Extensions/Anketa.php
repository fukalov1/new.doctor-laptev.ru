<?php

namespace App\Admin\Extensions;

use App\User;
use App\Profile;
use App\Question;
use Encore\Admin\Admin;

class Anketa
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function title()
    {
        return view('title');
    }



    public static function index($id)
    {

        $type = 'первичная';
        if($profile = Profile::find($id)) {
            $type = $profile->type;
        }
        $questions = Question::where('type', $type)->get();
//dd(User::find($profile->user_id));
        return view('admin.anketa', [
            'user' => User::find($profile->user_id),
            'profile' => $profile,
            'questions' => $questions,
            ]);

    }
}
