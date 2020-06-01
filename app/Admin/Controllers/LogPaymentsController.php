<?php

namespace App\Admin\Controllers;

use App\PayService;
use App\LogPayment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LogPaymentsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\LogPayment';
    public $page_id;
    public $page_name = '';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    public function index(Content $content)
    {
        $this->getHeader();
        return $content
            ->header(' Оплаты за  "'.$this->page_name.'"')
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

    protected function grid()
    {
        $grid = new Grid(new LogPayment());

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();
        });

        $grid->model()->where('pay_service_id', session('payservice_id'));

//        $grid->column('id', __('Id'));
        $grid->column('inv_id', __('Номер счета'));
        $grid->column('sum', __('Сумма'));
//        $grid->column('pay_service_id', __('Pay service id'));
        $grid->user_name('user.name', __('ФИО'));
        $grid->user_name('user.email', __('Email'));
//        $grid->column('success', __('Success'));
//        $grid->column('comment', __('Comment'));
//        $grid->column('created_at', __('Created at'));
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
        $show = new Show(LogPayment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('inv_id', __('Inv id'));
        $show->field('sum', __('Sum'));
        $show->field('pay_service_id', __('Pay service id'));
        $show->field('user_id', __('User id'));
        $show->field('success', __('Success'));
        $show->field('comment', __('Comment'));
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
        $form = new Form(new LogPayment());

        $form->text('inv_id', __('Inv id'));
        $form->number('sum', __('Sum'));
        $form->number('pay_service_id', __('Pay service id'));
        $form->number('user_id', __('User id'));
        $form->switch('success', __('Success'));
        $form->textarea('comment', __('Comment'));

        return $form;
    }

    private function getHeader() {
        $data = PayService::find(session('payservice_id'));
        if ($data) {
            $this->page_name = $data->name;
        }
    }
}
