<?php

namespace App\Enums;

enum CutOffDateAction: string
{
    case NONE = 'none';
    case CALCULATE_TIME = 'calculate_time';
    case DELETE_RECORDS = 'delete_records';

    public static function getValues(): array
    {
        return [
            self::NONE,
            self::CALCULATE_TIME,
            self::DELETE_RECORDS,
        ];
    }
}
