<?php declare(strict_types=1);

namespace BenSampo\Enum\Tests;

use BenSampo\Enum\Exceptions\InvalidEnumMemberException;
use BenSampo\Enum\Tests\Enums\DescriptionFromAttribute;
use BenSampo\Enum\Tests\Enums\ExtraValueFromAttribute;
use BenSampo\Enum\Tests\Enums\InvalidMultipleClassExtraValueFromAttribute;
use Exception;
use PHPUnit\Framework\TestCase;

class EnumAttributeExtraValueTest extends TestCase
{
    public function test_enum_can_get_class_extra_value_defined_using_attribute()
    {
        $this->assertSame(['Enum extra value'], ExtraValueFromAttribute::getClassExtraValue());
    }

    public function test_an_exception_is_thrown_when_accessing_a_class_extra_value_which_is_annotated_with_multiple_extra_value_attributes()
    {
        $this->expectException(Exception::class);

        InvalidMultipleClassExtraValueFromAttribute::getClassExtraValue();
    }

    public function test_enum_can_get_value_extra_value_defined_using_attribute()
    {
//        dd(ExtraValueFromAttribute::getDescription(ExtraValueFromAttribute::Administrator));
        $this->assertSame(['Admin'], ExtraValueFromAttribute::getExtraValue(ExtraValueFromAttribute::Administrator));
        $this->assertSame(['Mod (Level 1)'], ExtraValueFromAttribute::getExtraValue(ExtraValueFromAttribute::Moderator));
    }

    public function test_enum_extra_value_falls_back_to_get_extra_value_method_when_not_defined_using_attribute()
    {
        $this->assertSame(['Super Admin'], ExtraValueFromAttribute::getExtraValue(ExtraValueFromAttribute::SuperAdministrator));
    }

    public function test_an_exception_is_thrown_when_accessing_a_extra_value_which_is_annotated_with_multiple_extra_value_attributes()
    {
        $this->expectException(Exception::class);

        // @phpstan-ignore-next-line wrongly flagged as no-op
        ExtraValueFromAttribute::InvalidCaseWithMultipleExtraValue()->extraValue;
    }

    public function test_an_exception_is_thrown_when_accessing_a_extra_value_for_an_invalid_value()
    {
        $this->expectException(InvalidEnumMemberException::class);

        ExtraValueFromAttribute::getExtraValue('invalid');
    }
}
