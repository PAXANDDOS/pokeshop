<?php

namespace App\Http\Controllers;

use Framework\View;

/**
 * Contains controller methods for route and each subroute of home.
 */
class HomeController implements ControllerInterface
{
    /**
     * Controls the main page of home.
     *
     * @return void
     */
    public function index(): void
    {
        View::generate('home.php', 'template.php');
    }
}
