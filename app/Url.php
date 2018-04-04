<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    const STATUS_OPENED = 1;
    const STATUS_NOTIFIED = 2;
    const STATUS_CLOSED = 3;
    const STATUS_QUARANTINE = 4;

    public static function getStatusToCheck()
    {
        return [
            self::STATUS_OPENED,
            self::STATUS_NOTIFIED,
            self::STATUS_QUARANTINE,
        ];
    }
}
