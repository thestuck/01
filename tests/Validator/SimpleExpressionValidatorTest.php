<?php

namespace TheStuck\Validator;

use Tests\TestCase;

class SimpleExpressionValidatorTest extends TestCase
{
    /**
     * @var SimpleExpressionValidator
     */
    private $validator;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->validator = new SimpleExpressionValidator();
    }

    /**
     * @see SimpleExpressionValidator::validate()
     * @throws InvalidExpressionException
     */
    public function testFail(): void
    {
        $expression = "(1 + 1) - (2";

        $this->expectException(InvalidExpressionException::class);

        $this->validator->validate($expression);
    }

    /**
     * @see SimpleExpressionValidator::validate()
     * @throws InvalidExpressionException
     */
    public function testOk(): void
    {
        $expression = "(1 + 1) - (2 - 0)";

        $this->validator->validate($expression);

        $this->assertTrue(true);
    }
}
