<?php

namespace App\Http\Controllers;

/**
 * Contains controller methods for route and each subroute.
 */
interface ControllerInterface
{
    /**
     * Controls the main page.
     *
     * @return void
     */
    public function index(): void;
}
