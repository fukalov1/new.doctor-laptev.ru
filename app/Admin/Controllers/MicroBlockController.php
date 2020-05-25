<?php

namespace App\Admin\Controllers;

use App\MicroBlock;
use App\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MicroBlockController extends AdminController
{
    public $page_id=0;
    public $page_name = '';
    public $bread_crubs='';
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Микро-блоки';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $content)
    {
        $this->getHeader();
        $this->getBeadCrumbs(session('page_id'));
        if (Admin::user()->isAdministrator())
            $this->bread_crubs = '<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crubs;

        return $content
            ->header('Микро-блоки на странице '.$this->page_name)
            ->description(' список ')
            ->body($this->bread_crubs )
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
        $this->getBeadCrumbs(session('page_id'));

        return $content
            ->header('Микро-блоки '.$this->page_name)
            ->description(' просмотр ')
            ->body('<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crubs )
            ->body($this->detail($id));
    }


    public function create(Content $content)
    {
        $this->getHeader();
        $this->getBeadCrumbs(session('page_id'));

        return $content
            ->header('Блок Слайдеры на странице '.$this->page_name)
            ->description(' добавление ')
            ->body('<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crubs )
            ->body($this->form());
    }


    protected function grid()
    {
        $grid = new Grid(new MicroBlock());
        $grid->model()->where('page_id', session('page_id'));

//        $grid->column('id', __('Id'));
        $grid->column('name', __('Заголовок'));
        $grid->column('url', __('Ссылка'));
        $grid->column('order', __('Очередность'));
//        $grid->column('page_id', __('Page id'));
//        $grid->column('page_block_id', __('Page block id'));
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
        $show = new Show(MicroBlock::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('text', __('Text'));
        $show->field('order', __('Order'));
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
        $form = new Form(new MicroBlock());

        $form->text('name', __('Заголовок'));
        $form->text('url', __('Ссылка'));
        $form->ckeditor('text', 'Текст блока')
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
        $form->number('order', __('Очередность'))->default(1);
        $form->hidden('page_id')->value(session('page_id'));
        $form->hidden('page_block_id')->value(session('page_block_id'));

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
