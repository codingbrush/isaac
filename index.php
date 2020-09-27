<?php

require './vendor/autoload.php';
require './core/Helpers/Helpers.php';
require './core/Helpers/Config.php';

ob_start();
session_start();

use Isaac\Core\Http\Request;
use Isaac\Core\Http\Router;

Router::load('routes.php')->direct(Request::uri(),Request::method());