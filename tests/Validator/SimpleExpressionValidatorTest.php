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
     * @see SimpleExpressionValidator::validateParentheses()
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
     * @see SimpleExpressionValidator::validateParentheses()
     * @throws InvalidExpressionException
     */
    public function testOk(): void
    {
        $expression = "(1 + 1) - (2 - 0)";

        $this->validator->validate($expression);

        $this->assertTrue(true);
    }

    /**
     * @param string $expression
     *
     * @see SimpleExpressionValidator::validate()
     * @see SimpleExpressionValidator::validateInput()
     * @dataProvider casesTestInput
     *
     * @throws InvalidExpressionException
     */
    public function testInput(string $expression)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->validator->validate($expression);
    }

    /**
     * @return array
     */
    public function casesTestInput(): array
    {
        return [
            'chars' => ['(a)'],
            'bad symbol#1' => [':'],
            'bad symbol#2' => ['/'],
            'bad symbol#3' => ['*'],
        ];
    }
}
