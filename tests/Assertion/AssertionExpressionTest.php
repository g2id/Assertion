<?php

namespace G2id\AssertionTest\Assertion;

use G2id\Assertion\Assertion\AssertionExpression;
use PHPUnit\Framework\TestCase;

class AssertionExpressionTest extends TestCase
{
    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValuesAreTheSame(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = ['Hofladen', 'Pädagogische Angebote,Bauernhofpädagogik, Angebote für Kinder'];
        $value2 = array(
            0 => 'Hofladen',
            1 => 'Pädagogische Angebote,Bauernhofpädagogik, Angebote für Kinder',
        );
        $this->assertTrue($assertionExpression->isSame($value1, $value2));

        $value1 = [];
        $value2 = array();
        $this->assertTrue($assertionExpression->isSame($value1, $value2));

        $value1 = 1;
        $value2 = 1;
        $this->assertTrue($assertionExpression->isSame($value1, $value2));

        $value1 = 'Pineapple';
        $value2 = 'Pineapple';
        $this->assertTrue($assertionExpression->isEqual($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValuesAreNotTheSame(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = ['Hofladen', 'Pädagogische Angebote,Bauernhofpädagogik, Angebote für Kinder'];
        $value2 = array(
            0 => 'Hofladen',
        );
        $this->assertTrue($assertionExpression->isNotSame($value1, $value2));
        $value1 = [];
        $value2 = array(0);
        $this->assertTrue($assertionExpression->isNotSame($value1, $value2));
        $value1 = 1;
        $value2 = '1';
        $this->assertTrue($assertionExpression->isNotSame($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValuesAreEqual(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = '1';
        $this->assertTrue($assertionExpression->isEqual($value1, $value2));

        $value1 = 'Pineapple';
        $value2 = 'pineapple';
        $this->assertTrue($assertionExpression->isEqual($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsGreaterThanValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 2;
        $value2 = 1;
        $this->assertTrue($assertionExpression->isGreaterThan($value1, $value2));

        $value1 = 2.1;
        $value2 = 2.0;
        $this->assertTrue($assertionExpression->isGreaterThan($value1, $value2));

        $value1 = '2.1';
        $value2 = '2.0';
        $this->assertTrue($assertionExpression->isGreaterThan($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsGreaterThanOrEqualValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 2;
        $value2 = 1;
        $this->assertTrue($assertionExpression->isGreaterThanOrEqual($value1, $value2));

        $value1 = 2.1;
        $value2 = 2.0;
        $this->assertTrue($assertionExpression->isGreaterThanOrEqual($value1, $value2));

        $value1 = '2.1';
        $value2 = '2.0';
        $this->assertTrue($assertionExpression->isGreaterThanOrEqual($value1, $value2));

        $value1 = 2;
        $value2 = 2;
        $this->assertTrue($assertionExpression->isGreaterThanOrEqual($value1, $value2));

        $value1 = 2.0;
        $value2 = 2.0;
        $this->assertTrue($assertionExpression->isGreaterThanOrEqual($value1, $value2));

        $value1 = '2.0';
        $value2 = '2.0';
        $this->assertTrue($assertionExpression->isGreaterThanOrEqual($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsLessThanValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = 2;
        $this->assertTrue($assertionExpression->isLessThan($value1, $value2));

        $value1 = 2.0;
        $value2 = 2.1;
        $this->assertTrue($assertionExpression->isLessThan($value1, $value2));

        $value1 = '2.0';
        $value2 = '2.1';
        $this->assertTrue($assertionExpression->isLessThan($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsLessThanOrEqualValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = 2;
        $this->assertTrue($assertionExpression->isLessThanOrEqual($value1, $value2));

        $value1 = 2.0;
        $value2 = 2.1;
        $this->assertTrue($assertionExpression->isLessThanOrEqual($value1, $value2));

        $value1 = '2.0';
        $value2 = '2.1';
        $this->assertTrue($assertionExpression->isLessThanOrEqual($value1, $value2));

        $value1 = 2;
        $value2 = 2;
        $this->assertTrue($assertionExpression->isLessThanOrEqual($value1, $value2));

        $value1 = 2.0;
        $value2 = 2.0;
        $this->assertTrue($assertionExpression->isLessThanOrEqual($value1, $value2));

        $value1 = '2.0';
        $value2 = '2.0';
        $this->assertTrue($assertionExpression->isLessThanOrEqual($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsBetweenValue2AndValue3(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 2;
        $value2 = 1;
        $value3 = 3;
        $this->assertTrue($assertionExpression->isBetween($value1, $value2, $value3));

        $value1 = 2.1;
        $value2 = 2.0;
        $value3 = 2.2;
        $this->assertTrue($assertionExpression->isBetween($value1, $value2, $value3));

        $value1 = '2.1';
        $value2 = '2.0';
        $value3 = '2.2';
        $this->assertTrue($assertionExpression->isBetween($value1, $value2, $value3));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsNotBetweenValue2AndValue3(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = 2;
        $value3 = 3;
        $this->assertTrue($assertionExpression->isNotBetween($value1, $value2, $value3));

        $value1 = 2.0;
        $value2 = 2.1;
        $value3 = 2.2;
        $this->assertTrue($assertionExpression->isNotBetween($value1, $value2, $value3));

        $value1 = '2.0';
        $value2 = '2.1';
        $value3 = '2.2';
        $this->assertTrue($assertionExpression->isNotBetween($value1, $value2, $value3));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsInArrayValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = [1, 2, 3];
        $this->assertTrue($assertionExpression->isInArray($value1, $value2));

        $value1 = 2.0;
        $value2 = [2.0, 2.1, 2.2];
        $this->assertTrue($assertionExpression->isInArray($value1, $value2));

        $value1 = '2.0';
        $value2 = ['2.0', '2.1', '2.2'];
        $this->assertTrue($assertionExpression->isInArray($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValue1IsNotInArrayValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = [2, 3, 4];
        $this->assertTrue($assertionExpression->isNotInArray($value1, $value2));

        $value1 = 2.0;
        $value2 = [2.1, 2.2, 2.3];
        $this->assertTrue($assertionExpression->isNotInArray($value1, $value2));

        $value1 = '2.0';
        $value2 = ['2.1', '2.2', '2.3'];
        $this->assertTrue($assertionExpression->isNotInArray($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValueIsTypeOfValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = 'integer';
        $this->assertTrue($assertionExpression->isTypeOf($value1, $value2));

        $value1 = 2.0;
        $value2 = 'double';
        $this->assertTrue($assertionExpression->isTypeOf($value1, $value2));

        $value1 = '2.0';
        $value2 = 'string';
        $this->assertTrue($assertionExpression->isTypeOf($value1, $value2));
    }

    public function itShouldReturnTrueIfValueIsNotTypeOfValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $value2 = 'double';
        $this->assertTrue($assertionExpression->isNotTypeOf($value1, $value2));

        $value1 = 2.0;
        $value2 = 'integer';
        $this->assertTrue($assertionExpression->isNotTypeOf($value1, $value2));

        $value1 = '2.0';
        $value2 = 'integer';
        $this->assertTrue($assertionExpression->isNotTypeOf($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValueIsInstanceOfValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = new \stdClass();
        $value2 = \stdClass::class;
        $this->assertTrue($assertionExpression->isInstanceOf($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValueIsNotInstanceOfValue2(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = new \stdClass();
        $value2 = \DateTime::class;
        $this->assertTrue($assertionExpression->isNotInstanceOf($value1, $value2));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValueIsTrue(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1;
        $this->assertTrue($assertionExpression->isTrue($value1));

        $value1 = 1 < 2;
        $this->assertTrue($assertionExpression->isTrue($value1));

        $value1 = 'true';
        $this->assertTrue($assertionExpression->isTrue($value1));

        $value1 = 'TRUE';
        $this->assertTrue($assertionExpression->isTrue($value1));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldReturnTrueIfValueIsFalse(): void
    {
        $assertionExpression = new AssertionExpression();
        $value1 = 1 > 2;
        $this->assertTrue($assertionExpression->isFalse($value1));

        $value1 = 'false';
        $this->assertTrue($assertionExpression->isFalse($value1));

        $value1 = 'FALSE';
        $this->assertTrue($assertionExpression->isFalse($value1));
    }
}
