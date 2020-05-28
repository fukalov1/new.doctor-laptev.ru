<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPayment extends Model
{
    protected $fillable = ['inv_id', 'sum', 'pay_service_id', 'user_id', 'success', 'comment'];


}
