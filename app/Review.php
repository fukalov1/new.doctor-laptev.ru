<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $fillable = ['name', 'city', 'email', 'text', 'hide'];

    public function importGb() {
        try {
            $datas = DB::connection('old')->select('select * from gb');
            $s = 0;
            $e = 0;
            foreach ($datas as $item) {
                try {
                    $result = $this->updateOrCreate(
                        ['id' => $item->id],
                        [
                            'name' => $item->name,
                            'text' => $item->txt,
                            'city' => $item->city,
                            'email' => $item->email,
                            'hide' => $item->hide,
                        ]);
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

    public function createReview($data)
    {
        $result = $this->create(
            [
                'name' => $data->name,
                'city' => $data->city,
                'email' => $data->email,
                'text' => $data->text,
            ]);

        return $result;
    }

}
