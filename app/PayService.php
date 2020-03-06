<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayService extends Model
{
    public function group_code() {
        return $this->belongsTo(GroupCode::class);
    }
}
