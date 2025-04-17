<?php

if (explode('/', $_SERVER['REQUEST_URI'])[1] !== 'api')
    session_start();
