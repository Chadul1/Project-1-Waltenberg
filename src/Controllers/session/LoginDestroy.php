<?php 

use Logger\LoggerFactory; 


$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has submitted logged out.');

$logger->info('The session was reset.');

    App\Functions\logout();

    echo '<meta http-equiv="refresh" content="0;url=../public">';
    exit();