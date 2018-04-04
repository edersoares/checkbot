<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlHistory extends Model
{
    protected $fillable = [
        'url_id',
        'status',
        'headers',
        'body',
    ];
}
