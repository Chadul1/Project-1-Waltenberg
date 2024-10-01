<?php

require('../src/Views/GameView.php');

use Logger\LoggerFactory;

$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has started the game.');