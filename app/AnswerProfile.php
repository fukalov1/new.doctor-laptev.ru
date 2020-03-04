<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerProfile extends Model
{
    public function profile() {
        return $this->belongsTo(Profile::class);
    }

    public function answer() {
        return $this->hasMany(Answer::class);
    }
}
