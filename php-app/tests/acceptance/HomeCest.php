<?php

class HomeCest
{
    public function navigationWorks(AcceptanceTester $I)
    {
        $I->wantTo('verify that navigation works fine.');

        $I->amOnPage('/');
        $I->see('Welcome', 'h2');

        $I->click('ABOUT');
        $I->seeCurrentUrlEquals('/');

        $I->click('CATALOG');
        $I->seeCurrentUrlEquals('/catalog');

        $I->click('SIGN IN');
        $I->seeCurrentUrlEquals('/signin');

        $I->click('Sign up!');
        $I->seeCurrentUrlEquals('/signup');
    }
}
