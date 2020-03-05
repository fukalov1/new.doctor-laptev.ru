<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use App\City;
use App\Code;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Дашбоард')
            ->description('Системные параметры')
            ->row('')
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::environment());
                    $users = new User();
                    $cities = new City();
                    $profiles = new Profile();
                    $codes = new Code();
                    $column->append(
                        '<h5>Клиентов: <b>'.count($users->all()).'</b><br>'
                        .'Первичных анкет: <b>'.count($profiles->where('type','первичная')->get()).'</b><br>'
                        .'Вторичных анкет: <b>'.count($profiles->where('type','вторичная')->get()).'</b><br>'
                        .'Городов (активных/всего): <b>'.count($cities->where('show',1)->get()).'/'.count($cities->all()).'</b><br>'
                        .'Выдано кодов: <b>'.count($codes->where('free',0)->get()).'</b><br>'
                        .'</h5>'
                    );
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
