<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['user_id', 'age', 'weight', 'rost', 'davlen', 'code', 'response', 'info', 'type', 'created_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
