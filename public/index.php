<?php 

namespace App;

use function Logger\initializeLogger;
use Logger\LoggerFactory;

require("../logger/logger.php");

//Start the session.
session_start();


initializeLogger('text');
$logger = LoggerFactory::getInstance()->getLogger();


//establishes the namespace being used.
require_once __DIR__ . "/../vendor/autoload.php";


//Grabs a general use case function class.
require_once 'functions.php';

//Instantiates the Router and adds the Routes.
$router = new Router();
$routes = require '../src/routes.php';

//Gets the uri and routes it accordingly.
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

