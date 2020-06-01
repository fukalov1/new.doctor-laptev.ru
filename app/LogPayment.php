<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogPayment extends Model
{
    protected $fillable = ['inv_id', 'sum', 'pay_service_id', 'user_id', 'success', 'comment'];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
