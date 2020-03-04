<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Question;
use App\Admin\Extensions\Anketa;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class ProfileUserController extends Controller
{
    public function index(Content $content, $id)
    {
        $profile = Profile::find($id);
         return $content
            ->title('Анкета '.$profile->type.' от '.$profile->created_at)
            ->description($profile->user->name)
            ->row(function (Row $row) use ($id) {

                $row->column(6, function (Column $column) use ($id) {
                    $column->append(Anketa::index($id));
                });
            });
    }
}
