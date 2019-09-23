<?php

namespace TheStuck\Validator;

/**
 * Validates by simple counting opened and closed parentheses.
 */
class SimpleExpressionValidator implements ExpressionValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function validate(string $expression): void
    {
        $this->validateInput($expression);
        $this->validateParentheses($expression);
    }

    /**
     * @param string $expression
     */
    private function validateInput(string $expression): void
    {
        $pattern = '/[^0-9\(\)\s\t\r\n\-\+]/i';

        if (preg_match($pattern, $expression)) {
            throw new \InvalidArgumentException("Bad expression");
        }
    }

    /**
     * @param string $expression
     * @throws InvalidExpressionException
     */
    private function validateParentheses(string $expression): void
    {
        $countOpen = mb_substr_count($expression, '(');
        $countClose = mb_substr_count($expression, ')');

        if ($countOpen !== $countClose) {
            throw new InvalidExpressionException();
        }
    }
}
