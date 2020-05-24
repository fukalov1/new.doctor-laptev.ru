<?php

namespace App\Admin\Controllers;

use App\Profile;
use App\Question;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use PDF;

class ProfileController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Анкеты';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Profile());

//        $grid->column('id', __('Id'));
        $grid->column('user.name', __('Пациент'));
        $grid->column('status', __('Статус'));
        $grid->column('age', __('Возраст'));
        $grid->column('weight', __('Вес'));
        $grid->column('rost', __('Рост'));
        $grid->column('davlen', __('Давление'));
        $grid->column('code', __('Код'));
        $grid->column('response', __('Вопрос'));
        $grid->column('info', __('Информация'));
        $grid->column('type', __('Тип'));
//        $grid->column('deleted_at', __('Deleted at'));
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



    public function exportProgramPDF($id)
    {

        $type = 'первичная';
        if($profile = Profile::find($id)) {
            $type = $profile->type;
            $name = $type=='первичная' ? 'programma_pervichnaya' : 'programma_vtorichnaya';


            $data = [];
            $data['profile'] = $profile;

            $pdf = PDF::loadView('programPDF', $data)->setPaper('a4');
            return $pdf->download("$name.pdf");
        }
        else {
            return response('not found');
        }
    }

    public function exportProfilePDF($id)
    {

        $type = 'первичная';
        if($profile = Profile::find($id)) {
            $type = $profile->type;


            $data = [];
            $data['profile'] = $profile;
            $data['user'] = User::find($profile->user_id);
            $data['questions'] = Question::where('type', $type)->get();

            $pdf = PDF::loadView('profilePDF', $data)->setPaper('a4');
            return $pdf->download("profile$id.pdf");
        }
        else {
            return response('not found');
        }
    }
}
