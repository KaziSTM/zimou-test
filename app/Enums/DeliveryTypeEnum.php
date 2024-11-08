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
}
