<?php

namespace App;
use App\PageBlock;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = ['anons','parent_id','title','description','keywords','name','url','image', 'order'];

    public function sub_pages()
    {
        return $this->hasMany(Page::class,'parent_id','id')->where('order', '>', 0)->orderBy('order');
    }

    public function page_blocks()
    {
        return $this->hasMany(PageBlock::class)->orderBy('orders');
    }

    public function getMenu()
    {
        return Page::where('parent_id', 0)
            ->where('order', '>', 0)
            ->get()->sortBy('order');
    }

    public function getMainArticle() {

        return Page::where('parent_id', 9)
            ->where('order', '>', 0)
            ->take(4)
            ->orderBy('id', 'desc')
            ->get();

    }

    public function getMainPhotoReview() {

        return PhotoReviewItem::inRandomOrder()->take(6)->get();

    }

    public function refillPageUrl($id, $prefix='')
    {
        foreach ($this->where('parent_id', $id)->get() as $page) {
            $page->url = $prefix.'/'.$this->translit($page->name);
            $page->save();
        }

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


}
