<?php

namespace G2id\Assertion\Assertion;

use G2id\Utilities\Utility\DebugUtility;
use G2id\Utilities\Utility\FormatUtility;
use G2id\Utilities\Utility\ValidateUtility;

class AssertionExpression implements AssertionExpressionInterface
{
    public function isTrue($value): bool
    {
        $value = FormatUtility::toBoolean($value);
        return ValidateUtility::isBoolean($value) && $value === true;
    }

    public function isFalse($value): bool
    {
        $value = FormatUtility::toBoolean($value);
        return ValidateUtility::isBoolean($value) && $value === false;
    }

    public function isNull($value): bool
    {
        return null === $value;
    }

    public function isNotNull($value): bool
    {
        return null !== $value;
    }

    public function isEmpty($value): bool
    {
        return ValidateUtility::isEmpty($value);
    }

    public function isNotEmpty($value): bool
    {
        return !ValidateUtility::isEmpty($value);
    }

    public function isInstanceOf($value, $instance): bool
    {
        return $value instanceof $instance;
    }

    public function isNotInstanceOf($value, $instance): bool
    {
        return !$value instanceof $instance;
    }

    public function isGreaterThan($value1, $value2): bool
    {
        return $value1 > $value2;
    }

    public function isGreaterThanOrEqual($value1, $value2): bool
    {
        return $value1 >= $value2;
    }

    public function isLessThan($value1, $value2): bool
    {
        return $value1 < $value2;
    }

    public function isLessThanOrEqual($value1, $value2): bool
    {
        return $value1 <= $value2;
    }

    public function isBetween($value, $min, $max): bool
    {
        return $value >= $min && $value <= $max;
    }

    public function isNotBetween($value, $min, $max): bool
    {
        return $value < $min || $value > $max;
    }

    public function isSame($value1, $value2): bool
    {
        return $this->isEqualType($value1, $value2) && $value1 === $value2;
    }

    public function isNotSame($value1, $value2): bool
    {
        return $this->isNotEqualType($value1, $value2) || $value1 !== $value2;
    }

    public function isEqual($value1, $value2): bool
    {
        if (is_string($value1) && is_string($value2)) {
            return strcasecmp($value1, $value2) === 0;
        }
        return $value1 == $value2;
    }

    public function isNotEqual($value1, $value2): bool
    {
        return $value1 != $value2;
    }

    public function isEqualType($value1, $value2): bool
    {
        return gettype($value1) === gettype($value2);
    }

    public function isNotEqualType($value1, $value2): bool
    {
        return gettype($value1) !== gettype($value2);
    }

    public function isInArray(mixed $value1, array $value2): bool
    {
        return in_array($value1, $value2, true);
    }

    public function isNotInArray(mixed $value1, array $value2): bool
    {
        return !in_array($value1, $value2, true);
    }

    public function isKeyInArray(mixed $value1, array $value2): bool
    {
        return array_key_exists($value1, $value2);
    }

    public function isKeyNotInArray(mixed $value1, array $value2): bool
    {
        return !array_key_exists($value1, $value2);
    }

    public function isTypeOf($value1, $value2): bool
    {
        return gettype($value1) === $value2;
    }
    public function isNotTypeOf($value1, $value2): bool
    {
        return gettype($value1) !== $value2;
    }
}
