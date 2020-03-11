<?php

namespace App\Admin\Controllers;

use App\PayService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use http\Env\Request;

class VideoFilesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Медиа файлы платного сервиса';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $content)
    {

        $data = ['payservice' => PayService::find(session('payservice_id', 1)) ];

        $str = view('admin.videofileupload', $data);

//        dd(phpinfo());

        return $content
            ->header('Медиа файлы платного сервиса')
            ->description(' список текстовых блоков')
            ->body( $str );

    }

    public function saveFiles()
    {
        $payservice = new PayService();
        if (session('payservice_id')) {
            if ($payservice->updateVideoFiles(session('payservice_id'))) {
//                dd('success');
            }
            else {
//                dd('failed');
            }
        }
        return redirect('/admin/pay-services');

    }

}
