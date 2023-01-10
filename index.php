<?php

require 'controllers/AuthController.php';
require 'controllers/BookController.php';
require 'controllers/UserController.php';
require 'controllers/LoanController.php';
require 'routing/router.php';
require 'routing/request.php';
require 'routing/routes.php';


use App\Routing\Router;
use App\Routing\Request;
use App\Routing\Routes;

// $file = 'routing/routes.php';
// var_dump(is_file($file) && is_readable($file));


Router::load('routing/routes.php')
    ->direct(Request::uri(), Request::method());
