<?php

/**
 * Contains an array of possible routes and actions.
 */

use App\Http\Controllers\{
    HomeController,
    AccountController,
    CatalogController,
    AuthController,
    CartController,
    ErrorController
};

return [
    '/' => [HomeController::class, 'index'],
    '/catalog' => [CatalogController::class, 'index'],
    '/catalog/{name}' => [CatalogController::class, 'ProductPage'],
    '/signin' => [AuthController::class, 'index'],
    '/signup' => [AuthController::class, 'signUp'],
    '/account' => [AccountController::class, 'index'],
    '/cart' => [CartController::class, 'index'],
    '/404' => [ErrorController::class, 'index'],
];
