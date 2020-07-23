<?php

namespace App\Admin\Controllers;

use App\Code;
use App\GroupCode;
use App\PayService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use http\Env\Request;

class PayServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Платные сервисы';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PayService());

        $grid->actions(function ($actions) {
            $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i>Медиа-файлы</a>');
        });

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();
            $filter->equal('archive', 'Архивный')->radio([
                '0'    => 'нет',
                '1'    => 'да',
            ]);
//            $filter->between('profiles.created_at', 'Дата анкеты')->date();

        });

        $grid->column('orders', __('Номер показа'))->editable();
        $grid->column('name', __('Наименование'))->display(function () {
            $archive = $this->archive ? '(архивный)' : '';
            return $this->name.' '.$archive;
        });
        $grid->column('group_code.name', __('Группа кодов'))->display(function () {
            if ($this->group_code) {
                $code_free = $this->codes()->where('free', true)->get()->count();
                $code_all = $this->codes()->get()->count();
                return '<a href="/admin/codes?set=' . $this->group_code->id . '">' . $this->group_code->name . ' (' . $code_free . '/' . $code_all . ')</a>';
            }
            else {
                return '<a href="/admin/group-codes">назначить</a>';
            }
        });
        $grid->column('price', __('Стоимость'));
        $grid->column('active', __('Активный'))->display(function () {
            return $this->active ? 'да' : 'нет';
        })->sortable();
        $grid->column('show_private', __('Закрытое видео'))->display(function () {
            return $this->show_private ? 'активно' : 'не активно';
        })->sortable();
        $grid->column('show_count', __('Макс. число показов'));
        $grid->column('max_time', __('Макс. время показа'));
        $grid->column('image', __('Image'))->display(function () {
            return $this->image ? '<img src="/uploads/'.$this->image.'" height="100"/>' : '';
        });
        $grid->media('Медиа-файлы')->display(function () {
            $str = '<a href="/admin/video-files?set='.$this->id.'"><i class="fa fa-paper-plane"></i> управлять</a><br/>';
            if ($this->video_m4v)
            $str .= '<a target="_blank" href="/storage/'.$this->video_m4v.'">'.$this->video_m4v.'</a><br/>';
            if ($this->video_webm)
            $str .= '<a target="_blank" href="/storage/'.$this->video_webm.'">'.$this->video_webm.'</a><br/>';
            if ($this->video_ogv)
            $str .= '<a target="_blank" href="/storage/'.$this->video_ogv.'">'.$this->video_ogv.'</a><br/>';
            if ($this->video_mp4)
            $str .= '<a target="_blank" href="/storage/'.$this->video_mp4.'">'.$this->video_mp4.'</a><br/>';
            if ($this->audio_mp3)
            $str .= '<a target="_blank" href="/storage/'.$this->audio_mp3.'">'.$this->audio_mp3.'</a>';

            return $str;
        });
        $grid->payments('Оплаты')->display(function () {
            return '<a href="/admin/log-payments?set='.$this->id.'">'.$this->log_payments()->get()->count().'</a>';
        });
//        $grid->column('video_m4v', __('Video m4v'));
//        $grid->column('video_webm', __('Video webm'));
//        $grid->column('video_ogv', __('Video ogv'));
//        $grid->column('video_mp4', __('Video mp4'));
//        $grid->column('audio_mp3', __('Audio mp3'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(PayService::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));
        $show->field('active', __('Active'));
        $show->field('show_count', __('Show count'));
        $show->field('max_time', __('Max time'));
        $show->field('text', __('Text'));
        $show->field('image', __('Image'));
        $show->field('video_m4v', __('Video m4v'));
        $show->field('video_webm', __('Video webm'));
        $show->field('video_ogv', __('Video ogv'));
        $show->field('video_mp4', __('Video mp4'));
        $show->field('audio_mp3', __('Audio mp3'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PayService());

//        $form->display('group_code.name', __('Группа кодов'));
//        $form->select('group_code.id', 'Группа кодов')->options(function ($id) {
//            $codes = GroupCode::select('id','name')->get();
//            return $codes->pluck('name', 'id');
//        });
        $form->switch('archive', __('Архивный'));
        $form->number('orders', __('Номер показа'));
        $form->text('name', __('Наименование'));
        $form->decimal('price', __('Стоимость'));
        $form->switch('active', __('Активный'));
        $form->number('show_count', __('Число показов'))->default(1);
        $form->number('max_time', __('Максимальная продолжительность'));
        $form->switch('auto_start', __('Автозапуск'));
        $form->datetime('start_date', 'Время запуска');
        $form->ckeditor('text', 'Текст публичной части')
            ->options(
                [
                    'filebrowserBrowseUrl' =>  '/ckfinder/browser',
                    'filebrowserImageBrowseUrl' =>  '/ckfinder/browser',
                    'filebrowserUploadUrl' => '/ckfinder/browser?type=Files',
                    'filebrowserImageUploadUrl' => '/ckfinder/browser?command=QuickUpload&type=Images',
                    'lang' => 'ru',
                    'height' => 500,
                    'filebrowserWindowWidth' => '1000',
                    'filebrowserWindowHeight' => '700'
                ])->default('-');
        $form->switch('show_private', __('Видео закрытой части активно'));
        $form->ckeditor('private_text', 'Текст закрытой части')
            ->options(
                [
                    'filebrowserBrowseUrl' =>  '/ckfinder/browser',
                    'filebrowserImageBrowseUrl' =>  '/ckfinder/browser',
                    'filebrowserUploadUrl' => '/ckfinder/browser?type=Files',
                    'filebrowserImageUploadUrl' => '/ckfinder/browser?command=QuickUpload&type=Images',
                    'lang' => 'ru',
                    'height' => 500,
                    'filebrowserWindowWidth' => '1000',
                    'filebrowserWindowHeight' => '700'
                ])->default('-');
        $form->image('image', __('Image'));
        $form->display('video_m4v', __('Video m4v'));
        $form->display('video_webm', __('Video webm'));
        $form->display('video_ogv', __('Video ogv'));
        $form->display('video_mp4', __('Video mp4'));
        $form->display('audio_mp3', __('Audio mp3'));
//        $form->file('video_m4v', __('Video m4v'));
//        $form->file('video_webm', __('Video webm'));
//        $form->file('video_ogv', __('Video ogv'));
//        $form->file('video_mp4', __('Video mp4'));
//        $form->file('audio_mp3', __('Audio mp3'));

        return $form;
    }


}
