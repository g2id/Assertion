<?php

namespace G2id\AssertionTest\Assertion;

use G2id\Assertion\Assertion\Assertion;
use PHPUnit\Framework\TestCase;

class AssertionTest extends TestCase
{
    /**
     * @return void
     * @test
     * @throws \Exception
     */
    public function itShouldBeTrue(): void
    {
        $assertion = new Assertion();
        $this->assertTrue($assertion->evaluate('isTrue', true));
        $this->assertTrue($assertion->evaluate('isGreaterThan', 10, 9));
    }

    /**
     * @return void
     * @throws \Exception
     * @test
     */
    public function itShouldBeFalse(): void
    {
        $assertion = new Assertion();
        $this->assertFalse($assertion->evaluate('isTrue', false));
        $this->assertFalse($assertion->evaluate('isGreaterThan', 9, 10));
    }

    /**
     * @return void
     * @test
     * @throws \Exception
     */
    public function itShouldAddExpressionAndEvaluateAll(): void
    {
        $assertion = new Assertion();
        $result = $assertion->evaluateAll([
            ['expression' => 'isTrue', 'args' => [true]],
            ['expression' => 'isGreaterThan', 'args' => [10, 1]],
            ['expression' => 'isLessThan', 'args' => [10, 19]],
            ['expression' => 'isEqual', 'args' => [110, 10]],
        ]);
        $this->assertFalse($result);
        $this->assertTrue($assertion->evaluateAll([
            ['expression' => 'isTrue', 'args' => [true]],
            ['expression' => 'isGreaterThan', 'args' => [10, 9]],
        ]));

        $this->assertTrue($assertion->evaluateAll([
            ['expression' => 'isBetween', 'args' => [3, 1, 30]]
        ]));

        $this->assertTrue($assertion->evaluateAll([
            ['expression' => 'isInstanceOf', 'args' => [new \stdClass(), \stdClass::class]]
        ]));
    }

    /**
     * @return void
     * @test
     */
    public function itShouldGetListOfExpressions(): void
    {
        $assertion = new Assertion();
        $this->assertIsArray($assertion->getListOfExpressions());
    }
}
