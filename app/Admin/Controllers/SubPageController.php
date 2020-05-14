<?php

namespace App\Admin\Controllers;

use App\Page;
use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SubPageController extends Controller
{
    use HasResourceActions;
    public $bread_crumbs='';
    public $bread_crumb_value='';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $this->getHeader();
        $this->getBreadCrumbs(session('page_id'));
        if (Admin::user()->isAdministrator())
            $this->bread_crumbs = '<a href="/admin/pages"> Структура сайта</a> / '.$this->bread_crumbs;


        return $content
            ->header('Раздел "'.$this->page_name.'""')
            ->description($this->bread_crumbs)
            ->body($this->bread_crumbs)
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
    public function edit($id, Content $content)
    {
        $this->getHeader();
        return $content
            ->header('Раздел '.$this->page_name)
            ->description(' список подразделов/страниц')
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
        $this->getBreadCrumbs(session('page_id'));
        return $content
            ->header('Раздел '.$this->page_name)
            ->description($this->bread_crumbs)
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page);

        $grid->model()->where('parent_id',session('page_id'));

        if (session('page_id')==config('id_articles', 7))
            $grid->model()->orderBy('created_at', 'desc');


        $grid->filter(function($filter){
            // Remove the default id filter
            $filter->disableIdFilter();
            $filter->like('name', 'Наименование ');
        });


        $grid->created_at('Дата создания')->sortable();
//        $grid->parent_id('Parent id');
//        $grid->title('Title');
//        $grid->description('Description');
//        $grid->keywords('Keywords');
        $grid->name('Наименование')->display(function ($name) {
            $str = $this->name;
            if ($this->relation)
                $str = "<a href='/admin/sub_pages?set={$this->id}' title='перейти к подразделам или вложенным страницам'>{$this->name}</a>";
            else
                return "<a href='/admin/page_blocks?set={$this->id}' title='перейти к текстовым блокам страницы'>{$this->name}</a>";
            return $str;
        });
        $grid->url('Адрес страницы')->display(function($url) {
            $link = '';
            if (isset($this->redirect))
                $link = 'Перенаправлено на <a href="'.env('APP_URL').'/'.$this->redirect.'" target="_blank" title="просмотр страницы '.$this->name.'">'.$this->redirect.'</a>';
            else
                $link = '<a href="'.env('APP_URL').'/'.$this->url.'" target="_blank" title="просмотр страницы '.$this->name.'">'.$this->url.'</a>';
            return $link;
        });
//        $grid->relation('Relation');
        $grid->order('Номер показа')->editable();
        $grid->page_blocks('Кол-во блоков')->display(function ($page_blocks) {
            $count = count($page_blocks);
            return "<a href='/admin/page_blocks?set={$this->id}' title='перейти к текстовым блокам'><span class='label label-warning'>{$count}</span></a>";
        });

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
        $show = new Show(Page::findOrFail($id));

        $show->id('Id');
        $show->parent_id('Parent id');
        $show->title('Title');
        $show->description('Description');
        $show->keywords('Keywords');
        $show->url('Url');
        $show->relation('Relation');
        $show->name('Name');
        $show->order('Order');
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

        $form = new Form(new Page);
//dd('bread_crumbs', session('page_id'), $this->getBreadCrumbs(session('page_id')));
        $form->tab('Основная', function ($form) {


            $form->switch('relation', 'Вложения');
            $form->text('name', 'Наименование')->required()->autofocus();
            if(session('page_id')==config('id_articles',9))
                $form->textarea('anons', 'Анонс');
            $form->number('order', 'Номер показа в меню')->default(1);

//            $form->hasMany('page_blocks', 'Блоки страниц', function (Form\NestedForm $form) {
//                $form->number('orders', 'Номер показа нас странице');
//                $form->text('header','Заголовок блока');
//                $form->ckeditor('content', 'Текст блока')->options(['lang' => 'ru', 'height' => 500]);
//                $form->file('image', 'Фото');
//            });
        })->tab('Мета', function ($form) {
            $form->hidden('parent_id')->default(session('page_id'));
            $form->text('title', 'Заголовок страницы');
            $form->text('description', 'Описание станицы');
            $form->text('keywords', 'Ключевые слова');
            $form->translate('url', 'Адрес страницы (url)')->attribute('rel', $this->bread_crumb_value);
            $form->text('redirect', 'Перенаправление');

        });

        $form->saving(function (Form $form) {
            $form->url = $this->translit($form->name);
        });

        return $form;
    }

    private function translit($s)
    {
        $s = (string)$s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
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

    private function getBreadCrumbs($id)
    {
        $page = Page::find($id);
        $this->bread_crumbs = " <a href='/admin/sub_pages?set={$page->id}'>".$page->name."</a> / ".$this->bread_crumbs;
        $this->bread_crumb_value = $page->name."/".$this->bread_crumb_value;

        if (($page->parent_id>0) and (Admin::user()->isAdministrator()) ) {
            $this->getBreadCrumbs($page->parent_id);
        }
    }

}
