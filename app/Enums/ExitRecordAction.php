<?php

namespace App\Enums;

enum ExitRecordAction: string
{
    case ONLY_RECORD = 'only_record';
    case ADD_TIME = 'add_time';
    case CALCULATE_TIME = 'calculate_time';

    public static function getValues(): array
    {
        return [
            self::ONLY_RECORD,
            self::ADD_TIME,
            self::CALCULATE_TIME,
        ];
    }
}
