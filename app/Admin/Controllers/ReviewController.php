<?php

namespace App\Admin\Controllers;

use App\Review;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class ReviewController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Отзывы';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Review());

        $grid->model()->orderBy('created_at', 'desc');

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('name', 'ФИО');
            $filter->like('email', 'E-mail');
            $filter->like('city', 'Город');
            $filter->equal('hide', 'Видимость')->radio([
                ''   => 'Все',
                true    => 'скрытые',
                false    => 'показанные',
            ]);
            $filter->between('created_at', 'Дата отзыва')->date();

        });
//        $grid->column('id', __('Id'));
        $grid->column('name', __('ФИО'));
        $grid->column('city', __('Город'));
        $grid->column('email', __('Email'));
        $grid->text('Текст')->display(function ($text) {
            return strip_tags($text);
//            return ($this->str_limit(strip_tags($text), 250, '...'));
//            return '<pre>'.substr($this->text,0,250).'</pre>';
        });
        $grid->column('hide', 'Скрыт')->display(function () {
            return $this->hide ? 'да' : 'нет';
        });
        $grid->column('created_at', __('Дата отзыва'));
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
        $show = new Show(Review::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('city', __('City'));
        $show->field('text', __('Text'));
        $show->field('email', __('Email'));
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
        $form = new Form(new Review());
        $form->switch('hide', __('Скрыт'));
        $form->text('name', __('ФИО'));
        $form->text('city', __('Город'));
        $form->email('email', __('Email'));
        $form->textarea('text', __('Сообщение'));

        return $form;
    }

    protected function str_limit($value, $limit = 100, $end = '...') {
            return Str::limit($value, $limit, $end);
    }

}
