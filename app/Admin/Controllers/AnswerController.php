<?php

namespace App\Admin\Controllers;

use App\Answer;
use App\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnswerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ответы анкет <a href="/admin/questions?type=первичная">первичной</a> / <a href="/admin/questions?type=вторичная">вторичной</a> ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Answer());
        $grid->header(function ($query) {
            $question = Question::find(session('question_id'));
            return "<h4>на вопрос: \"".$question->text."\"</h4>";
        });

        $grid->model()->where('question_id', session('question_id'));

//        $grid->column('id', __('Id'));
//        $grid->column('question_id', __('Question id'));
        $grid->column('text', __('Текст ответа'));
        $grid->column('block', __('Блок программы'));
        $grid->column('orders', __('Очередность'));
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
        $show = new Show(Answer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('question_id', __('Question id'));
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
        $form = new Form(new Answer());

        $form->hidden('question_id')->value(session('question_id'));
        $form->text('text', __('Ответ'));
        $form->textarea('block', __('Блок'));
        $form->number('orders', __('Очередность'))->default(1);

        return $form;
    }
}
