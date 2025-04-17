<?php

namespace App\Http\Controllers\Api;

use Framework\Api\Http;
use App\Models\User;

/**
 * API methods for users
 */
class UserController extends Controller
{
    /**
     * Shows all users.
     *
     * @return void
     */
    public function index(): void
    {
        Http::response('json', User::getAll());
    }

    /**
     * Shows user by its ID.
     *
     * @param int $id ID of the user.
     * @return void
     */
    public function show(int $id): void
    {
        Http::response('json', User::findOne($id));
    }
}
