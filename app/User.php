<?php

namespace App;

use App\Profile;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'user_id', 'deleted_at', 'city_id', 'city'
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

    public function cities() {
        return $this->hasOne(City::class, 'id', 'city_id');
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
                    echo "User ".$user->fio." city ".$user->city."\n";
                    $city = City::find($user->city) ? City::find($user->city)->name : 'не найден';
                    $result = $this->updateOrCreate(
                        ['email' => $user->email],
                        [
                        'name' => $user->fio,
                        'phone' => $user->phone,
                        'password' => '12345678',
                        'city' => $city,
                        'city_id' => $user->city,
                        ]);
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
//                        echo "Response $user->response Profile $profile->id Count ".count($responses)."\n";
                        foreach ($responses as $item) {
                            if((int)$item != 0) {
//                                echo "Attache answer $item to profile $profile->id\n";
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

    public function addProfile($user)
    {
            $profile = Profile::create([
                'user_id' => Auth::id(),
                'age' => $user->age,
                'weight' => $user->weight,
                'rost' => $user->rost,
                'davlen' => $user->davlen,
                'response' => $user->response,
                'info' => 'Последний визит '.$user->last_visit.' Беспокоит: '.$user->diseases,
                'type' => $user->type
            ]);
            $responses = explode(',', $user->answers);
//            echo "Response $user->response Profile $profile->id Count " . count($responses) . "\n";
            foreach ($user->answer as $item) {
                if ((int)$item != 0) {
//                    echo "Attache answer $item to profile $profile->id\n";
                    $profile->answers()->attach($item);
                }
            }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

}
