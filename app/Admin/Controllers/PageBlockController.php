<?php

namespace App\Admin\Controllers;
use App\Page;
use App\PageBlock;
use Encore\Admin\Facades\Admin;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use http\Env\Request;

class PageBlockController extends Controller
{
    use HasResourceActions;
    public $page_id=0;
    public $page_name = '';
    public $bread_crubs='';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $this->getHeader();
        $this->getBeadCrumbs(session('page_id'));
        if (Admin::user()->isAdministrator())
            $this->bread_crubs = '<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crubs;

        return $content
            ->header('Страница '.$this->page_name)
            ->description(' список текстовых блоков')
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
        return $content
            ->header('Страница '.$this->page_name)
            ->description(' список текстовых блоков')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        $this->getHeader();
        return $content
            ->header('Страница '.$this->page_name)
            ->description(' список текстовых блоков')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        $this->getHeader();
        return $content
            ->header('Страница '.$this->page_name)
            ->description(' список текстовых блоков')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PageBlock);
        $grid->model()->where('page_id',session('page_id'))->orderBy('orders');

//        $grid->id('Id');
//        $grid->page_id('Page id');
        $grid->orders('Номер показа')->editable();
//        $grid->header('Заголовок');
        $grid->submenu('Пункт подменю')->display(function () {
            $str = 'нет';
            if ($this->submenu)
                $str = 'да';
            return $str;
        });
        $grid->text('Текст')->display(function ($text) {
            return (substr(strip_tags($text), 0, 250));
//            return '<pre>'.substr($this->text,0,250).'</pre>';
        });
        $grid->question('Функционал')->display(function () {
            $str = '';
            if ($this->type==2) {
                $str = '<a href="/admin/directions?set='.$this->id.'">Текст с фото</a>';
            }
            elseif ($this->type==7) {
                $str = '<a href="/admin/sliders?set='.$this->id.'">слайдеры</a>';
            }
            elseif ($this->type==10) {
                $str = '<a href="/admin/mailforms?set='.$this->id.'">почтовая форма</a>';
            }
            elseif ($this->type==11) {
                $str = '<a href="/admin/photo-reviews?set='.$this->id.'">Фото-отзывы</a>';
            }
            elseif ($this->type==12) {
                $str = '<a href="/admin/micro_blocks?set='.$this->id.'">микро-блоки</a>';
            }
            return $str;
        });
        $grid->content('Фото')->display(function ($image) {
            $link = '';
            if ($this->image) {
                $link = '<a href="javascript:removePhoto(\''.$this->id.'\')"  class="photo'.$this->id.'" title="удалить фото">x</a><img class="photo'.$this->id.'" src="/uploads/'.$this->image.'" style="width: 150px;padding:5px; ">';
            }
            return $link;
        });
//        $grid->created_at('Created at');
        $grid->updated_at('Обновлено');

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
        $show = new Show(PageBlock::findOrFail($id));

        $show->id('Id');
        $show->page_id('Page id');
        $show->orders('Orders');
        $show->header('Header');
        $show->text('Text');
        $show->image('Image');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PageBlock);

        $form->select('type', 'Тип текстового блока')->options(function ($id) {
            $list = [
                '1' => 'Стандарт',
                '2' => 'Блок с фото слева',
                '3' => 'Блок с фото справа',
                '4'=> 'Блок с фото для статьи',
                '5'=> 'Промо-блок',
                '7'=> 'Слайдеры',
                '8'=> 'Произвольный блок',
//                '9'=> 'Фотогалерея',
                '10'=> 'Почтовая форма',
                '11'=> 'Фото-отзывы',
                '12'=> 'Микроблоки'
                ];
            return $list;
        })->default(1);

        $form->hidden('page_id')->value(session('page_id'));
        $form->number('orders', 'Номер показа')->default(1);
//        $form->switch('submenu', 'Пункт подменю');
        $form->text('header', 'Заголовок')->default('');
//        $form->ckeditor('text');
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
//        $form->myresizeimage('image', 'Фото');

        if ($this->isBlock4Article()) {
            $form->imageArticle('image', 'Фото для статьи')->disk('public');
        }
        else {
            $form->image('image', 'Фото')->disk('public');
        }

        return $form;
    }

    private function isBlock4Article() {
        $result = false;
        if ((session('page_id')==config('id_articles', 7)) or
            (Page::find(session('page_id'))->parent_id==config('id_articles', 7)))
            $result = true;
        return $result;
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
        $url = "/admin/sub_pages?set={$page->id}";
        if (!$page->relation)
            $url = "/admin/page_blocks?set={$page->id}";
        $this->bread_crubs = " <a href='$url'>".$page->name."</a> / ".$this->bread_crubs;

        if (($page->parent_id>0) and (Admin::user()->isAdministrator()) ) {
            $this->getBeadCrumbs($page->parent_id);
        }
    }

    public function removePhoto()
    {
        $id = \request('id');
        $page = PageBlock::find($id);
        $file = $page->image;
        if (file_exists(public_path('uploads/').$file))
            unlink(public_path('uploads/').$file);
        $page->update(['image' => '']);
        return json_encode(['result'=>'delete','id'=> $id]);
    }


}
