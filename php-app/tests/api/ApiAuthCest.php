<?php

class ApiAuthCest
{
    public function tryToSignUp(\ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('/auth/signup', [
            'name' => "FluffyTester",
            'email' => "fluff@jsmail.com",
            'password' => 'securepass1',
            'password_confirmation' => 'securepass1',
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            "message" => "string"
        ]);
    }

    public function tryToSignInAndSignOut(\ApiTester $I)
    {
        $user = [
            'name' => "FluffyTester",
            'email' => "fluff@jsmail.com",
            'password' => hash('md5', 'securepass1'),
        ];
        $I->haveInDatabase('users', $user);

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('/auth/signin', [
            'name' => $user['name'],
            'password' => 'securepass1',
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            "message" => "string",
            'cookie' => [
                'id' => 'integer',
                'name' => 'string',
                'email' => 'string:email',
                'token' => 'string'
            ]
        ]);

        $response = json_decode($I->grabResponse());
        $I->amBearerAuthenticated(explode(' ', $response->cookie->token)[1]);
        $I->sendPost('/auth/signout');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            "message" => "string"
        ]);
    }
}
