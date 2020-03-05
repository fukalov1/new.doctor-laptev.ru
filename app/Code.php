<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = ['group_code_id','client', 'phone', 'email', 'code', 'count','free', 'date'];

    public function group_code() {
        return $this->belongsTo(GroupCode::class);
    }
}
