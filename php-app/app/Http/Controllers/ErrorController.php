<?php

namespace App\Http\Controllers;

use Framework\View;

/**
 * Contains controller methods for route and each subroute of error page.
 */
class ErrorController implements ControllerInterface
{
    /**
     * Controls the main page of 404 error.
     *
     * @return void
     */
    public function index(): void
    {
        if (isset($_POST['back']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/", false, 303);
        View::generate('404.php', 'template.php');
    }
}
