<?php
require 'controllers/AuthController.php';
require 'controllers/BookController.php';
require 'controllers/UserController.php';
require 'controllers/LoanController.php';
require 'routing/router.php';
require 'routing/request.php';
require 'routing/routes.php';

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());
