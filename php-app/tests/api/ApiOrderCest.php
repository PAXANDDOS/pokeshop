<?php

class ApiOrderCest
{
    public function tryToGetOrders(\ApiTester $I)
    {
        $user = [
            'id' => 1,
            'name' => 'FluffyTester',
            'email' => 'fluff@jsmail.com',
            'password' => hash('md5', 'securepass1')
        ];
        $token = $this->authorize($I, $user);
        $I->amBearerAuthenticated($token);

        $I->haveInDatabase('orders', [
            'user_id' => $user['id'],
            'product_id' => 2
        ]);

        $I->sendGet('/orders');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            [
                'user_id' => $user['id'],
                'product_id' => 2,
                'name' => "Eevee",
                'image' => 'eevee.jpg'
            ]
        ]);
        $this->deauthorize($I);
    }

    public function tryToCreateOrder(\ApiTester $I)
    {
        $user = [
            'id' => 1,
            'name' => 'FluffyTester',
            'email' => 'fluff@jsmail.com',
            'password' => hash('md5', 'securepass1')
        ];
        $token = $this->authorize($I, $user);
        $I->amBearerAuthenticated($token);

        $I->sendPost('/orders', [
            [
                'id' => 1,
                'quantity' => 1,
            ],
            [
                'id' => 2,
                'quantity' => 3,
            ]
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            "message" => "string"
        ]);
        $this->deauthorize($I);
    }

    private function authorize(\ApiTester $I, array $user): string
    {
        $I->haveInDatabase('users', $user);
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('/auth/signin', [
            'name' => $user['name'],
            'password' => 'securepass1',
        ]);
        $response = json_decode($I->grabResponse());
        return explode(' ', $response->cookie->token)[1];
    }

    private function deauthorize(\ApiTester $I): void
    {
        $I->sendPost('/auth/signout');
    }
}
