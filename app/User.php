<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Profile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'user_id', 'deleted_at', 'city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function profiles() {
        return $this->hasMany(Profile::class);
    }


    public function importUser() {
        try {
            $users = DB::connection('old')->select('select * from users where email<> "" and city<>0');
            $s = 0;
            $e = 0;
            foreach ($users as $user) {
                try {
                    $result = $this->updateOrCreate([
                        'name' => $user->fio,
                        'phone' => $user->phone,
                        'password' => '12345678',
                        'city_id' => $user->city,
                    ],
                        ['email' => $user->email]);
                    if ($result->id) {
                        $profile = Profile::create([
                            'user_id' => $result->id,
                            'age' => $user->age,
                            'weight' => $user->weight,
                            'rost' => $user->rost,
                            'davlen' => $user->davlen,
                            'response' => $user->response,
                            'info' => $user->info,
                            'type' => $user->type,
                            'created_at' => $user->date,
                            'deleted_at' => $user->timestamp,
                        ]);
                        $responses = explode(',', $user->response);
                        echo "Response $user->response Profile $profile->id Count ".count($responses)."\n";
                        foreach ($responses as $item) {
                            if((int)$item != 0) {
                                echo "Attache answer $item to profile $profile->id\n";
                                $profile->answers()->attach($item);
                            }
                        }
                    }
                    $s++;
                } catch (\Exception $exception) {
                    $e++;
//                    echo "Error " . $exception->getMessage() . "\n";
                }
            }
            echo "Import $s records. Skip $e.\n";
        }
        catch (\Exception $exception) {
            echo "Error connect to database! ".$exception->getMessage()."\n";
        }
    }

}
