<?php

namespace App\Admin\Controllers;

use App\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->equal('type')->radio([
                ''   => 'Все',
                'первичная'    => 'Первичная анкета',
                'вторичная'    => 'Вторичная анкета',
            ]);

        });

        $grid->column('id', __('Id'));
        $grid->column('type', __('Type'));
        $grid->column('name', __('Name'));
        $grid->column('text', __('Text'));
        $grid->column('orders', __('Orders'));
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
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('name', __('Name'));
        $show->field('text', __('Text'));
        $show->field('orders', __('Orders'));
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
        $form = new Form(new Question());

        $form->text('type', __('Type'))->default('первичная');
        $form->text('name', __('Name'));
        $form->textarea('text', __('Text'));
        $form->number('orders', __('Orders'))->default(1);

        return $form;
    }
}
