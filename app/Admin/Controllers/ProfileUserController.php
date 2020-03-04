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
         return $content
            ->title('Анкета')
            ->description(Profile::find($id)->type)
            ->row(function (Row $row) use ($id) {

                $row->column(6, function (Column $column) use ($id) {
                    $column->append(Anketa::index($id));
                });
            });
    }
}
