<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\ExportVcard;
use App\City;
use App\Profile;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use JeroenDesloovere\VCard\VCard;

class  UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Клиенты';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('name', 'ФИО');
            $filter->like('email', 'E-mail');
            $filter->like('phone', 'Телефон');
            $filter->like('city', 'Город регистрации');
            $filter->like('cities.name', 'Город анкеты');
//            $filter->like('profiles.code', 'Код клиента');
            $filter->equal('profiles.type', 'Тип анкет')->radio([
                ''   => 'Все',
                'первичная'    => 'Первичная анкета',
                'вторичная'    => 'Вторичная анкета',
            ]);
            $filter->between('profiles.created_at', 'Дата анкеты')->date();

        });

        $grid->actions(function ($actions) {
            $actions->add(new ExportVcard());
        });

        $grid->model()->orderBy('name');

//        $grid->column('id', __('Id'));
        $grid->column('name', __('ФИО'))->sortable();
        $grid->column('city', __('Город регистрации'))->sortable();
        $grid->column('cities.name', __('Город анкеты'))->sortable();
//        $grid->column('name', 'ФИО')->display(function ($city) {
//            return '<a href="/admin/profiles" title="анкета"></a>';
//        });
        $grid->column('phone', __('Телефон'))->sortable();
        $grid->column('email', __('Email'))->sortable();
        $grid->anketa('Анкета')->display(function () {
            $profiles = Profile::where('user_id', $this->id)->orderBy('created_at', 'desc')->get();
            $data = '';
            foreach ($profiles as $profile) {
                $data .= '<a href="/admin/show-anketa/'.$profile->id.'">'.$profile->type.' от ('.$profile->created_at.')</a><br/>';
            }
            return $data;
        });
//        $grid->column('email_verified_at', __('Email verified at'));
//        $grid->column('password', __('Password'));
//        $grid->column('remember_token', __('Remember token'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('city_id', __('City id'));
        $show->field('city', __('City'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('ФИО'));
        $form->text('city', __('Город, указанный при регистрации'))->default('');
        $form->select('city_id', 'Город из анкеты')->options(function () {
            $cities = City::pluck('name','id')->all();
            return $cities;
        })->default(1);
        $form->text('phone', __('Телефон'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'))->default('123456789');
//        $form->text('remember_token', __('Remember token'));

        return $form;
    }


    public function exportVCard30($id)
    {
        $result = '';
        $user = User::find($id);
        if($user) {
            $vcard = new VCard();

            $lastname='';
            $firstname = '';
            $result = $this->getUserName($user->name);
            if (json_decode($result)->success) {
                $lastname = json_decode($result)->lastname;
                $firstname = json_decode($result)->firstname;
            }
            else {
                return false;
            }
//            dd('l:',$lastname, 'f:',$firstname);
            $lastname = $lastname;
            $firstname = $firstname;
            $additional = '';
            $prefix = '';
            $suffix = '';

            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

            $vcard->addCompany('Клиент доктора Лаптева');
            $vcard->addJobtitle('Клиент');
            $vcard->addEmail($user->email);
            $vcard->addPhoneNumber($user->phone, 'PREF;WORK');
            $vcard->addPhoneNumber($user->phone, 'WORK');
            $vcard->addAddress(null, null, null, $user->city, null, null, 'Russia');
            $vcard->addLabel($user->city);
//            $vcard->addURL('http://www.jeroendesloovere.be');

//            $vcard->addPhoto(__DIR__ . '/landscape.jpeg');

// return vcard as a string
//return $vcard->getOutput();

// return vcard as a download
            return $vcard->download();
        }
        return false;
    }

    private function getUserName($str) {
        $str = rtrim($str);
        $str = ltrim($str);
        $str = preg_replace('/\s+/', ' ', $str);
        $fio = explode(" ",$str);
        if (is_array($fio)) {
            $lastname = $fio[0];
            if(count($fio)==3) {
                $firstname = $fio[1]." ".$fio[2];
            }
            elseif(count($fio)==2) {
                $firstname = $fio[1];
            }
            else {
                $firstname = $fio[0];
            }
            return json_encode(['success' => true, 'firstname' => $firstname, 'lastname' => $lastname]);
        }
        else {
            return json_encode(['success' => false]);
        }
    }

}
