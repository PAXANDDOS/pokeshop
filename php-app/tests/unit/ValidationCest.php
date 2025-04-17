<?php

use Framework\Validation;

class ValidationCest
{
    public function tryToTestIncorrectUserNameValidation(UnitTester $I)
    {
        $name = 'Paul L';
        $I->assertFalse(Validation::validateName($name));
    }

    public function tryToTestCorrectUserNameValidation(UnitTester $I)
    {
        $name = 'Paul';
        $I->assertTrue(Validation::validateName($name));
    }

    public function tryToTestUserSuccessfulValidation(UnitTester $I)
    {
        $name = 'Paul';
        $email = 'paul@gmail.com';
        $password = 'securepass1';
        $I->assertTrue(Validation::validateUser($name, $email, $password));
    }

    public function tryToTestUserFailedValidation(UnitTester $I)
    {
        $I->expectThrowable(Framework\Exceptions\ValidationException::class, function () {
            $name = 'Paul';
            $email = 'paul@gmail';
            Validation::validateUser($name, $email);
        });
    }

    /**
     * @dataProvider emailDataProvider
     */
    public function tryToTestUserEmailValidation(UnitTester $I, \Codeception\Example $example)
    {
        $I->assertEquals($example['expectedResult'], Validation::validateEmail($example['email']));
    }

    /**
     * @return array
     */
    protected function emailDataProvider(): array
    {
        return [
            ['email' => 'alex@gmail.com', 'expectedResult' => true],
            ['email' => 'ann@ukr.net', 'expectedResult' => true],
            ['email' => 'user:iam@mail.com', 'expectedResult' => false],
            ['email' => 'user@mail', 'expectedResult' => false],
        ];
    }
}
