<?php

namespace App\Enums;

enum CutOffDateAction: string
{
    case NONE = 'none';
    case RESET_VEHICLES_TIME = 'reset_vehicles_time';
    case DELETE_RECORDS = 'delete_records';

    public static function getValues(): array
    {
        return [
            self::NONE,
            self::RESET_VEHICLES_TIME,
            self::DELETE_RECORDS,
        ];
    }
}
