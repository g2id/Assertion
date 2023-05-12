<?php

namespace G2id\Assertion\Assertion;

use G2id\Utilities\Utility\ClassUtility;

class Assertion
{
    private $output = [];
    private AssertionExpression $assertionExpression;
    private array $expressions = [];

    public function __construct()
    {
        $this->assertionExpression = new AssertionExpression();
    }

    /**
     * @throws \Exception
     */
    public function evaluate(string $expression, ...$args): bool
    {
        $expressionArray = $this->getExpression($expression);
        return call_user_func_array($expressionArray, $args);
    }

    private function getExpression(string $expression): array
    {
        //$expression = 'is' . ucfirst($expression);
        foreach ($this->expressions as $expressionObject) {
            if (method_exists($expressionObject, $expression)) {
                return [$expressionObject, $expression];
            }
        }
        if (method_exists($this->assertionExpression, $expression)) {
            return [$this->assertionExpression, $expression];
        }
        throw new \RuntimeException('Expression not found');
    }

    /**
     * @throws \Exception
     */
    public function evaluateAll(array $expressions): bool
    {
        foreach ($expressions as $expression) {
            if (!$this->evaluateWithDescription($expression['expression'], ...$expression['args'])) {
                return false;
            }
        }
        return true;
    }

    public function evaluateWithDescription(string $expression, ...$args): bool
    {
        $expressionArray = $this->getExpression($expression);
        $result = call_user_func_array($expressionArray, $args);
        $this->output[] = [
            'expression' => $expression,
            'args' => $args,
            'assertion' => $result ? 'passed' : 'failed',
        ];
        return $result;
    }

    /**
     * @return array
     */
    public function getOutput(): array
    {
        return $this->output;
    }

    public function getListOfExpressions(): array
    {
        return ClassUtility::getMethods($this->assertionExpression);
    }
}
