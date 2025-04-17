<?php

/**
 * Contains an array of possible api routes and actions.
 */

use App\Http\Controllers\Api\{
    AuthController,
    CatalogController,
    OrderController,
    UserController,
};

return [
    'POST /auth/signin' => [AuthController::class, 'signIn'],
    'POST /auth/signup' => [AuthController::class, 'signUp'],
    'POST /auth/signout' => [AuthController::class, 'signOut'],
    'GET /users' => [UserController::class, 'index'],
    'GET /users/{id}' => [UserController::class, 'show'],
    'GET /catalog' => [CatalogController::class, 'index'],
    'GET /catalog/{id}' => [CatalogController::class, 'show'],
    'GET /orders' => [OrderController::class, 'index'],
    'GET /orders/{id}' => [OrderController::class, 'show'],
    'POST /orders' => [OrderController::class, 'create'],
    'DELETE /orders/{id}' => [OrderController::class, 'destroy'],
];
