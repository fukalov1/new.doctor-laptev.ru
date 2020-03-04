<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
    protected $fillable = ['question_id', 'text', 'orders'];

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function importAnswer() {
        try {
            $answers = DB::connection('old')->select('select * from response order by id, orders');
            $s = 0;
            $e = 0;
            foreach ($answers as $item) {
                try {
                    $result = $this->updateOrCreate([
                        'question_id' => $item->request,
                        'text' => $item->txt,
                        'orders' => $item->orders,
                    ],
                        ['id' => $item->id]);
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
