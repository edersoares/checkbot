<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    const STATUS_OPENED = 1;
    const STATUS_NOTIFIED = 2;
    const STATUS_CLOSED = 3;
    const STATUS_QUARANTINE = 4;

    protected $fillable = [
        'host', 'available_at', 'status', 'port'
    ];

    public static function getStatusToCheck()
    {
        return [
            self::STATUS_OPENED,
            self::STATUS_NOTIFIED,
            self::STATUS_QUARANTINE,
        ];
    }

    public function getStatusText()
    {
        switch ($this->status) {

            case self::STATUS_OPENED:
                return 'Aberto';

            case self::STATUS_NOTIFIED:
                return 'Notificado';

            case self::STATUS_CLOSED:
                return 'Fechado';

            case self::STATUS_QUARANTINE:
                return 'Quarentena';
        }
    }
}
