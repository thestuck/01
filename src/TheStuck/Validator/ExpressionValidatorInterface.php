<?php

namespace TheStuck\Validator;

interface ExpressionValidatorInterface
{
    /**
     * @param string $expression
     * @throws InvalidExpressionException
     */
    public function validate(string $expression): void;
}
