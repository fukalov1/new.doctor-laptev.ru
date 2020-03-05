<?php

namespace App\Admin\Controllers;

use App\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Расписание по городам';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new City());

//        $grid->column('id', __('Id'));
        $grid->column('date', __('Дата'));
        $grid->column('name', __('Город'));
        $grid->column('image', 'Картинка')->display(function () {
            $str = $this->image!='' ? '<img src="/uploads/images/'.$this->image.'" height="100"/>' : '';
            return $str;
        });
//        $grid->column('text', __('Text'));
        $grid->column('show', 'Активен')->display(function () {
            return $this->show ? 'да' : 'нет';
        });
//        $grid->column('orders', __('Orders'));
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
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('text', __('Text'));
        $show->field('show', __('Show'));
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
        $form = new Form(new City());
        $form->switch('show', __('Активен'));
        $form->date('date', __('Дата'));
        $form->text('name', __('Наименование'));
        $form->myimage('image', __('Image'));
        $form->ckeditor('text', 'Описание')
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

        $form->number('orders', __('Очередность'))->default(1);

        return $form;
    }
}
