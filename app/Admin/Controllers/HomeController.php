<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Setting;
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
                    $setting = Setting::where('name', 'SiteEnable')->first();
                    $site_enable = '<input type="radio" name="siteEnable" class="site-enable" value="1" checked> да
                            <input type="radio" name="siteEnable" class="site-enable" value="0"> нет';
                    if ($setting->value==0) {
                        $site_enable = '<input type="radio" name="siteEnable" class="site-enable" value="1"> да
                            <input type="radio" name="siteEnable" class="site-enable" value="0" checked> нет';
                    }

                    $content = '<div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped">
                    <tr>
                        <td width="50%"><a href="/admin/users">Клиентов:</a></td>
                        <td>'.count($users->all()).'</td>
                    </tr>
                    <tr>
                        <td width="50%">Первичных анкет:</td>
                        <td>'.count($profiles->where('type','первичная')->get()).'</td>
                    </tr>
                    <tr>
                        <td width="50%">Вторичных анкет:</td>
                        <td>'.count($profiles->where('type','вторичная')->get()).'</td>
                    </tr>
                    <tr>
                        <td width="50%"><a href="/admin/cities">Городов (активных/всего)</a>:</td>
                        <td>'.count($cities->where('show',1)->get()).'/'.count($cities->all()).'</td>
                    </tr>
                    <tr>
                        <td width="50%">Выдано кодов:</td>
                        <td>'.count($codes->where('free',0)->get()).'</td>
                    </tr>
                    <tr>
                        <td width="50%">Сайт включен:</td>
                        <td>
                            '.$site_enable.'
                        </td>
                    </tr>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>';

                    $column->append(
                        $content
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
