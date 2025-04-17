<?php

class ProductCest
{
    public function tryToBuy(AcceptanceTester $I)
    {
        $I->wantTo('verify that you can buy a product.');

        $I->amOnPage('/signin');
        $I->submitForm('form', [
            'name' => "FluffyTester",
            'password' => 'securepass',
        ]);

        $I->amOnPage('/catalog/1');
        $I->see('Charmander', 'h2');
        $I->click('input[type=submit]');


        $I->amOnPage('/cart');
        $I->see('Charmander', 'h3');
        $I->click('input[name=order]');


        $I->amOnPage('/account');
        $I->see('Charmander', 'h2');
    }
}
