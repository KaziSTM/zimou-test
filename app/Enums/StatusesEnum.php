<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Pending()
 * @method static static InTransit()
 * @method static static Delivered()
 * @method static static Returned()
 * @method static static Canceled()
 */
final class StatusesEnum extends Enum
{
    const Pending = 'pending';
    const InTransit = 'in transit';
    const Delivered = 'delivered';
    const Returned = 'returned';
    const Canceled = 'canceled';

    public static function prepareValues(): array
    {
        return collect(self::getValues())->map(fn($value) => ['name' => $value])->toArray();
    }
}
