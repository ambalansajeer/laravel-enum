<?php

namespace BenSampo\Enum\Tests\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Attributes\ExtraValue;

#[ExtraValue(['First Enum description'])]
// @phpstan-ignore-next-line intentionally wrong
#[ExtraValue(['Second Enum description'])]
final class InvalidMultipleClassExtraValueFromAttribute extends Enum
{
    const Administrator = 0;

    const Moderator = 1;
}
