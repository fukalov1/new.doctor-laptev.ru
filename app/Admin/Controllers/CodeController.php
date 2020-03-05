<?php

namespace App\Admin\Controllers;

use App\Code;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Коды доступа';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Code());

        $grid->model()->where('group_code_id', session('group_code_id'));

//        $grid->column('id', __('Id'));
//        $grid->column('group_code_id', __('Group code id'));
        $grid->column('client', __('Клиент'));
        $grid->column('phone', __('Телефон'));
        $grid->column('email', __('Email'));
        $grid->column('code', __('Номер'));
        $grid->column('count', __('Просмотры'));
        $grid->column('free', __('Свободен'));
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
        $show = new Show(Code::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('group_code_id', __('Group code id'));
        $show->field('client', __('Client'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('code', __('Code'));
        $show->field('count', __('Count'));
        $show->field('free', __('Free'));
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
        $form = new Form(new Code());

        $form->number('group_code_id', __('Group code id'));
        $form->text('client', __('Client'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->text('code', __('Code'));
        $form->number('count', __('Count'));
        $form->switch('free', __('Free'))->default(1);

        return $form;
    }
}
