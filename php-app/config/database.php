<?php

/**
 * Contains information about the database and its' credentials.
 */

define('DB_DIR', APP_ROOT . '/database/');
define('DB_CONNECTION', getenv('DB_CONNECTION') ? getenv('DB_CONNECTION') : 'mysql');
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : '127.0.0.1');
define('DB_PORT', getenv('DB_PORT') ? getenv('DB_PORT') : '3306');
define('DB_DATABASE', getenv('DB_DATABASE') ? getenv('DB_DATABASE') : 'nixedu');
define('DB_USERNAME', getenv('DB_USERNAME') ? getenv('DB_USERNAME') : 'root');
define('DB_PASSWORD', getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : '');
