<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Traits\CastsEnums;
use BenSampo\Enum\Tests\Enums\UserType;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Result extends Enum
{
    const Choice = 1;
    const Negative = 2;
    const Positive = 3;

    public static function getDescription($value): string
    {
        if ($value === self::Choice) {
            return '未選択';
        }
        if ($value === self::Negative) {
            return '検出せず';
        }
        if ($value === self::Positive) {
            return '陽性';
        }
        return parent::getDescription($value);
    }

    public static function getValue(string $key)
    {
        if ($key === '未選択') {
            return self::Choice;
        }
        if ($key === '検出せず') {
            return self::Negative;
        }
        if ($key === '陽性') {
            return self::Positive;
        }
        return parent::getValue($key);
    }

}
