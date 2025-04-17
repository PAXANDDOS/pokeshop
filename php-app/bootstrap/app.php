<?php

/**
 * Loads different modules and starts the application.
 */

(new \Framework\DotEnv(dirname(dirname(__FILE__)) . '/.env'))->load();

foreach (glob(dirname(dirname(__FILE__)) . '/config' . '/*.php') as $file)
    require_once $file;

\Framework\Handler::register();
\Framework\Session::protect();

$data = \Framework\Router::start();
$method = $data[1];

try {
    ($data[0])->$method(...$data[2]);
} catch (\Framework\Exceptions\NotFoundException $e) {
    die($e);
}
