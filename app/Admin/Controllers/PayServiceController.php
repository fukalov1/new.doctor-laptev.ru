<?php

namespace App\Admin\Controllers;

use App\PayService;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PayServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\PayService';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PayService());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));
        $grid->column('active', __('Active'));
        $grid->column('show_count', __('Show count'));
        $grid->column('max_time', __('Max time'));
        $grid->column('text', __('Text'));
        $grid->column('image', __('Image'));
        $grid->column('video_m4v', __('Video m4v'));
        $grid->column('video_webm', __('Video webm'));
        $grid->column('video_ogv', __('Video ogv'));
        $grid->column('video_mp4', __('Video mp4'));
        $grid->column('audio_mp3', __('Audio mp3'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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

        $form->text('name', __('Name'));
        $form->decimal('price', __('Price'));
        $form->switch('active', __('Active'));
        $form->number('show_count', __('Show count'))->default(1);
        $form->number('max_time', __('Max time'));
        $form->textarea('text', __('Text'));
        $form->image('image', __('Image'));
        $form->text('video_m4v', __('Video m4v'));
        $form->text('video_webm', __('Video webm'));
        $form->text('video_ogv', __('Video ogv'));
        $form->text('video_mp4', __('Video mp4'));
        $form->text('audio_mp3', __('Audio mp3'));

        return $form;
    }
}
