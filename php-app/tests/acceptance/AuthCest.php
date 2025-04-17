<?php

class AuthCest
{
    public function tryToAuthorize(AcceptanceTester $I)
    {
        $I->wantTo('verify that authorization works fine.');

        $I->amOnPage('/signup');
        $I->submitForm('form', [
            'name' => "FluffyTester",
            'email' => "someemail@gmail.com",
            'password' => 'securepass',
            'password_confirmation' => 'securepass',
        ]);
        $I->seeCurrentUrlEquals('/signin');
        $I->submitForm('form', [
            'name' => "FluffyTester",
            'password' => 'securepass',
        ]);
        $I->seeCurrentUrlEquals('/account');
        $I->click('input[name=logout]');
        $I->seeCurrentUrlEquals('/signin');
    }
}
