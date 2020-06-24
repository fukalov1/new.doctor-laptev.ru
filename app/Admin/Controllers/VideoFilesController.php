<?php

namespace App\Admin\Controllers;

use App\PayService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;

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
//                dd('success',session('payservice_id'));
            }
            else {
//                dd('failed',session('payservice_id'));
            }
        }
        return redirect('/admin/pay-services');

    }

    public function deleteFile(Request $request)
    {
        $filename = request()->filename;
        $filetype = request()->filetype;
        $payservice = new PayService();

        if (session('payservice_id')) {
            if ($payservice->find(session('payservice_id'))->update([$filetype => null])) {
                try {
                    unlink(storage_path('app/public/'.$filename));
                }
                catch (\Exception $exception) {
                    
                }
                //                dd('success',session('payservice_id'));
            }
            else {
//                dd('failed',session('payservice_id'));
            }
        }
        return redirect('/admin/video-files?set='.session('payservice_id'));

    }

}
