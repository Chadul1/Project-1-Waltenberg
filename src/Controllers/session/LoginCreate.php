<?php 

require("../src/Views/Login.php");

use Logger\LoggerFactory; 


$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has gone to the login page.');