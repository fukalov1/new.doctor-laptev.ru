<?php

namespace App\Admin\Extensions;

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
        $profile = Profile::find($id);
        $questions = Question::where('type', $profile->type)->get();

        return view('admin.anketa', [
            'profile' => $profile,
            'questions' => $questions
            ]);

    }
}
