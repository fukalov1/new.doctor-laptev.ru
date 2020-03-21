<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\CheckRow;
use App\GroupCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GroupCodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Группы кодов доступа';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GroupCode());

        $grid->actions(function ($actions) {
            $actions->disableView();
//            $actions->append('<a href="/admin/load_codes"><i class="fa fa-paper-plane"></i>загрузить коды доступа</a>');
//            $actions->prepend(new CheckRow($actions->getKey()));
        });

//        $grid->column('id', __('Id'));
        $grid->column('pay_service.name', __('Платный сервис'));
        $grid->column('name', 'Наименование группы')->display(function () {
            return '<a href="/admin/codes?set='.$this->id.'">'.$this->name.'</a>';
        });
        $grid->column('start_date', __('Дата начала'));
        $grid->column('end_date', __('Срок окончания'));
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
        $show = new Show(GroupCode::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pay_service_id', __('Pay service id'));
        $show->field('name', __('Name'));
        $show->field('start_date', __('Start date'));
        $show->field('end_date', __('End date'));
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
        $form = new Form(new GroupCode());

        $form->number('pay_service_id', __('Платный сервис'));
        $form->text('name', __('Наименование группы'));
        $form->date('start_date', __('Дата начала'))->default(date('Y-m-d'));
        $form->date('end_date', __('Срок окончания'))->default(date('Y-m-d'));
        $form->filecode('file', 'Файл групп кодов (импорт только из редактирования)')
            ->disk('codes')
            ->dir('files')
            ->rules('mimes:txt');

        return $form;
    }
}
