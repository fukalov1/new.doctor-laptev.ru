<?php

namespace App\Admin\Controllers;

use App\Code;
use App\GroupCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Коды доступа';
    public $page_id;
    public $page_name = '';


    public function index(Content $content)
    {
        $this->getHeader();
        return $content
            ->header(' Коды доступа "'.$this->page_name.'"')
            ->description('список')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        $this->getHeader();
        return $content
            ->header('Раздел '.$this->page_name)
            ->description(' список подразделов/страниц')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    /**
     * Make a grid builder.
     *
     * @return Grid
     */


    protected function grid()
    {
        $grid = new Grid(new Code());

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('client', 'Клиент');
            $filter->like('email', 'E-mail');
            $filter->like('code', 'Номер кода');
            $filter->lt('count', 'Количество просмотров до ');
            $filter->between('date', 'Дата выдачи')->date();
            $filter->equal('free')->radio([
                ''   => 'Все',
                '1'    => 'свободные',
                '0'    => 'выданные',
            ]);

        });

        $grid->model()->where('group_code_id', session('group_code_id'));

//        $grid->column('id', __('Id'));
//        $grid->column('group_code_id', __('Group code id'));
        $grid->column('client', __('Клиент'))->sortable();
        $grid->column('phone', __('Телефон'));
        $grid->column('email', __('Email'));
        $grid->column('code', __('Номер'));
        $grid->column('count', __('Просмотры'))->sortable();
        $grid->column('free', __('Выдан'))->display(function () {
            return $this->free ? 'нет' : 'да';
        })->sortable();
        $grid->column('date', __('Дата выдачи'))->sortable();
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

        $form->hidden('group_code_id')->value(session('group_code_id'));
        $form->text('client', __('Клиент'));
        $form->mobile('phone', __('Телефон'));
        $form->email('email', __('Email'));
        $form->text('code', __('Код'))->required();
        $form->number('count', __('Количество просмотров'))->default(0);
        $form->switch('Free', __('Свободен'))->default(1);

        return $form;
    }
    private function getHeader() {
        $data = GroupCode::find(session('group_code_id'));
        if ($data) {
            $this->page_name = $data->name;
        }
    }
}
