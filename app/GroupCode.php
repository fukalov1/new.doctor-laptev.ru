<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupCode extends Model
{

    protected $fillable = ['name','start_date', 'end_date'];

    public function pay_service() {
        return $this->belongsTo(PayService::class);
    }

    public function codes() {
        return $this->hasMany(Code::class);
    }

    public function importCodes() {
        try {
            $datas = DB::connection('old')->select('select * from grp_codes');

            $s = 0;
            $e = 0;
            foreach ($datas as $item) {
                try {
                    $result = $this->updateOrCreate(
                        ['id' => $item->id],
                        ['name' => $item->name,
                            'start_date' => $item->date1,
                            'end_date' => $item->date2,
                        ]);
                    if ($result->id) {
                        $code_datas = DB::connection('old')->select('select * from codes where grp='.$result->id);
                        foreach ($code_datas as $item1) {
                            $free = $item1->count ? false : true;
                            $codes = Code::updateOrCreate(
                                ['id' => $item1->id],
                                ['group_code_id' => $result->id,
                                    'client' => $item1->fio,
                                    'phone' => $item1->phone,
                                    'email' => $item1->email,
                                    'code' => $item1->code,
                                    'count' => $item1->count,
                                    'free' => $free,
                                    'date' => $item1->timestamp,
                                ]);
                        }
                    }
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
