<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $fillable = ['name', 'text', 'date', 'type'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function importQuestion() {
        try {
            $questions = DB::connection('old')->select('select * from requests order by id');
            $s = 0;
            $e = 0;
            foreach ($questions as $question) {
                try {
                    $type = $question->rod_id==1 ? 'первичная' : 'вторичная';
//                    echo $question->rod_id." - ".$type;
                    $result = $this->updateOrCreate([
                        'type' => $type,
                        'name' => $question->title,
                        'text' => $question->txt,
                        'orders' => $question->orders,
                    ],
                        ['id' => $question->id]);
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
