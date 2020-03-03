<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    protected $fillable = ['name', 'text', 'date', 'image'];

    public function importCity() {
        try {
            $cities = DB::connection('old')->select('select * from cities order by id');
            $s = 0;
            $e = 0;
            foreach ($cities as $city) {
                try {
                    $show = $city->orders ? true : false;
                    $result = $this->updateOrCreate([
                        'name' => $city->name,
                        'text' => $city->txt,
                        'date' => $city->data,
                        'show' => $show,
                    ],
                        ['id' => $city->id]);
                    $s++;
                } catch (\Exception $exception) {
                    $e++;
                    echo "Error " . $exception->getMessage() . "\n";
                }
            }
            echo "Import $s records. Skip $e.\n";
        }
        catch (\Exception $exception) {
            echo "Error connect to database! ".$exception->getMessage()."\n";
        }
    }

}
