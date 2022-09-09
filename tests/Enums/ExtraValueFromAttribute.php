<?php declare(strict_types=1);

namespace BenSampo\Enum\Tests\Enums;

use BenSampo\Enum\Attributes\ExtraValue;
use BenSampo\Enum\Enum;
use BenSampo\Enum\Attributes\Description;

#[ExtraValue(['Enum extra value'])]
final class ExtraValueFromAttribute extends Enum
{
    #[ExtraValue(['Admin'])]
    const Administrator = 0;

    #[ExtraValue(['Mod (Level 1)'])]
    const Moderator = 1;

    const Subscriber = 2;

    const SuperAdministrator = 3;

    #[ExtraValue(['First description'])]
    // @phpstan-ignore-next-line intentionally wrong
    #[ExtraValue(['Second description'])]
    const InvalidCaseWithMultipleExtraValue = 4;

    public static function getExtraValue(mixed $value): array
    {
        if ($value === self::SuperAdministrator) {
            return ['Super Admin'];
        }

        return parent::getExtraValue($value);
    }
}
