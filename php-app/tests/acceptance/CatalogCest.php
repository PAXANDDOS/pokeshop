<?php

class CatalogCest
{
    public function catalogWorks(AcceptanceTester $I)
    {
        $I->wantTo('look at the catalog and click at Charmander.');

        $I->amOnPage('/catalog');
        $I->see('Catalog', 'h2');
        $I->see('Charmander', 'h3');
        $I->click('a[href="/catalog/1"]');
        $I->seeCurrentUrlEquals('/catalog/1');
    }
}
