<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{

    public $table = 'exceptions';

    public $fillable = [
        'content'
    ];

}
