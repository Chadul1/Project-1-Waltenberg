<?php

require('../src/Views/RegisterView.php');

use Logger\LoggerFactory; 
$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has gone to the Register page');
