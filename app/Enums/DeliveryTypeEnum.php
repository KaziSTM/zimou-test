<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Standard()
 * @method static static Express()
 * @method static static Overnight()
 * @method static static SameDay()
 */
final class DeliveryTypeEnum extends Enum
{
    const Standard = 'standard';
    const Express = 'express';
    const Overnight = 'overnight';
    const SameDay = 'same day';

    public static function prepareValues(): array
    {
        return collect(self::getValues())->map(fn($value) => ['name' => $value])->toArray();
    }

    public static function label($value): string
    {
        return self::labels()[$value] ?? 'Unknown';
    }

    public static function labels(): array
    {
        return [
            self::Standard => trans('Standard'),
            self::Express => trans('Express'),
            self::Overnight => trans('Overnight'),
            self::SameDay => trans('Same Day'),
        ];
    }
}
