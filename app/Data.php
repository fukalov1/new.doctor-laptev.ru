<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Imagez;

class Data extends Model
{
    protected $table = 'data';

    public function data2Page() {
        $parent_id = 9;

        $pages = new Page();
        $pages->delete();

        $pageBlocks = new PageBlock();
        foreach ($this->all() as $item) {
            if ($this->prepare($item->image)) {
                echo "File ".$item->image." prepare\n";
            }
            else {
                echo "File ".$item->image." not found\n";
            }
            try {
                $page = Page::create([
                    'anons' => $item->anons,
                    'name' => $item->name,
                    'parent_id' => $parent_id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'keywords' => $item->keywords,
                    'order' => $item->orders,
                    'image' => $item->image,
                    'url' => '	posmotret-eshche/stati/' . $this->translit($item->name),
                ]);
//                dd('test', $page->id);

                PageBlock::create([
                    'page_id' => $page->id,
                    'type' => 3,
                    'header' => $item->title,
                    'text' => $item->text,
                    'image' => $item->image,
                    'orders' => 1,
                ]);
            } catch (\Exception $exception) {
                echo 'Error: ' . $exception->getMessage() . "\n";
                return false;
            }
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

    private function prepare($filename)
    {
        $width = 396;
        $height = 396;

        $file = storage_path('source/' . $filename) ;
        if (file_exists($file)) {

            //Prepare preview image
            try {
                $i = Imagez::make($file);
                $w = $i->width();
                $h = $i->height();

                if ($w / $h > $width / $height) {
                    $i->resize(round($height * $w / $h, 0), $height);
                }
                else {
                    $i->resize($width, round($width * $h / $w, 0));
                }

                if ($h > $height) {
                    $i->resize(round($height * $w / $h, 0), $height);
                    $i->resizeCanvas($width, $height, 'center', false, 'ffffff');
                }
                $i->save(public_path('uploads') . '/images/thumbnail/' . $filename);
                copy($file, public_path('uploads/images/'.$filename) );
            }
            catch (\Exception $exception) {
                echo 'Error: '.$exception->getMessage()."\n";
                return false;
            }
            return true;
        }
        else {
            return false;
        }
    }

}
