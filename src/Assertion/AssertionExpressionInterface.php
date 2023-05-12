<?php

namespace G2id\Assertion\Assertion;

interface AssertionExpressionInterface
{
    public function isTrue($value);

    public function isFalse($value);

    public function isNull($value);

    public function isNotNull($value);

    public function isEmpty($value);

    public function isNotEmpty($value);

    public function isInstanceOf($value, $instance);

    public function isNotInstanceOf($value, $instance);

    public function isGreaterThan($value1, $value2);

    public function isGreaterThanOrEqual($value1, $value2);

    public function isLessThan($value1, $value2);

    public function isLessThanOrEqual($value1, $value2);

    public function isBetween($value, $min, $max);

    public function isNotBetween($value, $min, $max);

    public function isSame($value1, $value2);

    public function isNotSame($value1, $value2);

    public function isEqual($value1, $value2);

    public function isNotEqual($value1, $value2);
}
