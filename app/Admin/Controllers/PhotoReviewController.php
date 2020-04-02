<?php

namespace App\Admin\Controllers;

use App\Page;
use App\PhotoReview;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PhotoReviewController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    public $page_id=0;
    public $page_name = '';
    public $bread_crubs='';
    protected $title = 'App\PhotoReview';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PhotoReview());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'))->display(function () {
            return '<a href="/admin/photo-review-items?set='.$this->id.'">'.$this->name.'</a>';
        });
        $grid->column('page_id', __('Page id'));
        $grid->column('page_block_id', __('Page block id'));
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
        $show = new Show(PhotoReview::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('type', __('Type'));
        $show->field('page_id', __('Page id'));
        $show->field('page_block_id', __('Page block id'));
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
        $form = new Form(new PhotoReview());

        $form->hidden('page_id')->value(session('page_id'));
        $form->hidden('page_block_id')->value(session('page_block_id'));
        $form->text('name', 'Наименование');

        $form->hasMany('items', function (Form\NestedForm $form) {
            $form->number('orders', 'Номер показа')->default(1);
            $form->text('title','Заголовок');
            $form->textarea('text', 'Текст');
            $form->imageReview('image', 'Фото');
            $form->imageReview('image1', 'Фото1');
            $form->imageReview('image2', 'Фото2');
//                $form->file('image', 'Картинка');
        });


        return $form;
    }

    private function getHeader() {
        $page = Page::find(session('page_id'));
        if ($page) {
            $this->page_id = $page->id;
            $this->page_name = $page->name;
        }
        else {
            return redirect('/admin/pages');
        }
    }

    private function getBeadCrumbs($id)
    {
        $page = Page::find($id);
        $this->bread_crubs = " <a href='/admin/sub_pages?set={$page->id}'>".$page->name."</a> / ".$this->bread_crubs;

        if (($page->parent_id>0) and (Admin::user()->isAdministrator()) ) {
            $this->getBeadCrumbs($page->parent_id);
        }
    }


}
