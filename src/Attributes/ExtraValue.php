<?php declare(strict_types=1);

namespace BenSampo\Enum\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS_CONSTANT | Attribute::TARGET_CLASS)]
class ExtraValue
{
    public function __construct(
        public array $extraValue,
    ) {
    }
}
