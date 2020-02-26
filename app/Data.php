<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    public function data2Page() {
        $parent_id = 9;

        $pages = new Page();
        $pages->delete();

        $pageBlocks = new PageBlock();
        foreach ($this->all() as $item) {
            $page = $pages->create([
                'anons' => $item->anons,
                'name' => $item->name,
                'parent_id' => $parent_id,
                'title' => $item->title,
                'description' => $item->description,
                'keywords' => $item->keywords,
                'order' => $item->orders,
                'image' => $item->image,
                'url' => '	posmotret-eshche/stati/'.$item->name,
            ]);
            $pageBlocks->create([
                'page_id' => $page->id,
                'header' => $item->title,
                'text' => $item->text,
                'image' => $item->image,
                'orders' => 1,
            ]);
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
