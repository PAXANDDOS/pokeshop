<?php

class ApiUserCest
{
    public function tryToGetUsers(\ApiTester $I)
    {
        $user = [
            'id' => 1,
            'name' => 'FluffyTester',
            'email' => 'fluff@jsmail.com',
            'password' => hash('md5', 'securepass1')
        ];
        $I->haveInDatabase('users', $user);
        $I->sendGet('/users');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([$user]);
    }

    public function tryToGetUser(\ApiTester $I)
    {
        $user = [
            'id' => 1,
            'name' => 'FluffyTester',
            'email' => 'fluff@jsmail.com',
            'password' => hash('md5', 'securepass1')
        ];
        $I->haveInDatabase('users', $user);
        $I->sendGet('/users/' . $user['id']);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($user);
    }
}
