<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\ProfileProcessed;
use App\Profile;
use App\User;
use App\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProfileCityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    public $city = '';
    public $title = 'Клиенты';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */


    protected function grid()
    {
        $this->getHeader();
        $grid = new Grid(new Profile());
        $grid->header(function () {
            return "<h4>Необработаные анкеты клиентов в г. ".$this->city."</h4>";
        });

        $grid->model()->join('users', 'users.id', 'profiles.user_id')
            ->where('processed', false)
            ->where('users.city_id', session('city_id'))
            ->select('profiles.*')
            ->orderBy('created_at', 'desc');

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();
            $actions->add(new ProfileProcessed());
        });

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('user.name', 'ФИО');
            $filter->like('user.email', 'E-mail');
            $filter->equal('profiles.type', 'Тип анкет')->radio([
                ''   => 'Все',
                'первичная'    => 'Первичная анкета',
                'вторичная'    => 'Вторичная анкета',
            ]);
            $filter->between('profiles.created_at', 'Дата анкеты')->date();

        });
        $grid->column('user.name', __('ФИО'));
        $grid->column('user.phone', __('Телефон'));
        $grid->column('user.email', __('Email'));
        $grid->anketa('Анкета')->display(function () {
            return '<a href="/admin/show-anketa/'.$this->id.'">'.$this->type.'</a> | <a href="/admin/export/profile-pdf/'.$this->id.'" target="_blank">Скачать</a>';
        });
        $grid->programm('Программа')->display(function () {
            return '<a href="/admin/export/program-pdf/'.$this->id.'" target="_blank">Скачать</a>';
        });
        $grid->column('created_at', __('Дата'));

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
        $show = new Show(Profile::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('status', __('Status'));
        $show->field('age', __('Age'));
        $show->field('weight', __('Weight'));
        $show->field('rost', __('Rost'));
        $show->field('davlen', __('Davlen'));
        $show->field('code', __('Code'));
        $show->field('response', __('Response'));
        $show->field('info', __('Info'));
        $show->field('type', __('Type'));
        $show->field('deleted_at', __('Deleted at'));
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
        $form = new Form(new Profile());

//        $form->select('user_id', 'Пациент')->options(function ($user_id) {
//            return User::find($this->user_id);
//        });
        $form->hidden('user_id')->value(session('user_id'));
        $form->switch('status', __('Статус'));
        $form->number('age', __('Возраст'));
        $form->number('weight', __('Вес'));
        $form->number('rost', __('Рост'));
        $form->text('davlen', __('Давление'));
        $form->text('code', __('Код'));
        $form->text('response', __('Вопрос'));
        $form->textarea('info', __('Информация'));
        $form->text('type', __('Тип'));

        return $form;
    }

    private function getHeader() {
        $city = City::find(session('city_id'));
        if ($city) {
            $this->city = $city->name;
        }
        else {
            return redirect('/admin/cities');
        }
    }
}
