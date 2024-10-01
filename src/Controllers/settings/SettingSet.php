<?php 

require("../src/Views/Settings.php");
use Logger\LoggerFactory;

$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has gone to the Settings.');