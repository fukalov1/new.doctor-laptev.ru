<?php

namespace App\Admin\Controllers;

use App\PhotoReviewItem;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PhotoReviewItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Фото отзывы клиентов';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PhotoReviewItem());
        $grid->model()->orderBy('created_at', 'desc');

        $grid->column('id', __('Id'));
//        $grid->column('photo_review_id', __('Photo review id'));
//        $grid->column('title', __('Title'));
        $grid->column('text', __('Text'));
//        $grid->column('url', __('Url'));
        $grid->column('image', __('Image'))->display(function ($image) {
            return '<img class="photo'.$this->id.'" src="/uploads/images/thumbnail/'.$this->image.'">';
        });
        $grid->column('image1', __('Image'))->display(function ($image) {
            return '<img class="photo'.$this->id.'" src="/uploads/images/thumbnail/'.$this->image1.'">';
        });
        $grid->column('image2', __('Image'))->display(function ($image) {
            return '<img class="photo'.$this->id.'" src="/uploads/images/thumbnail/'.$this->image2.'">';
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
        $show = new Show(PhotoReviewItem::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('photo_review_id', __('Photo review id'));
        $show->field('title', __('Title'));
        $show->field('text', __('Text'));
        $show->field('url', __('Url'));
        $show->field('image', __('Image'));
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
        $form = new Form(new PhotoReviewItem());

        $form->hidden('photo_review_id')->value(session('photo_review_id'));
//        $form->text('title', __('Title'));
        $form->textarea('text', __('Text'));
//        $form->url('url', __('Url'));
        $form->imageReview('image', __('Image'));
        $form->imageReview('image1', __('Image1'));
        $form->imageReview('image2', __('Image2'));
        $form->number('orders', __('Orders'))->default(1);

        return $form;
    }
}
