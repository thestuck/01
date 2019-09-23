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
        $countOpen = mb_substr_count($expression, '(');
        $countClose = mb_substr_count($expression, ')');

        if ($countOpen !== $countClose) {
            throw new InvalidExpressionException();
        }
    }
}
