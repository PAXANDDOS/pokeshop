<?php

class ApiCatalogCest
{
    public function tryToGetCatalog(\ApiTester $I)
    {
        $I->sendGet('/catalog');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            [
                'id' => 1,
                'name' => 'Charmander',
                'image' => 'charmander.jpg'
            ]
        ]);
    }

    public function tryToGetProduct(\ApiTester $I)
    {
        $product = [
            'id' => 1,
            'name' => 'Charmander',
            'image' => 'charmander.jpg'
        ];
        $I->sendGet('/catalog/' . $product['id']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($product);
    }
}
