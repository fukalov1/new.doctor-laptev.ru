<?php

namespace App\Admin\Controllers;

use App\PayService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

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
        $str = view('admin.videofileupload');

        return $content
            ->header('Медиа файлы платного сервиса')
            ->description(' список текстовых блоков')
            ->body( $str );

    }


}
