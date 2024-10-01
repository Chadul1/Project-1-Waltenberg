<?php 
use Logger\LoggerFactory;

$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has hit a 404 error.');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1 class="font-bold">404. Sorry. Page Not Found.</h1>
    <p class="mt-4">
        <a href="/Week-1-Project-Waltenberg/public/" class="text-blue underline">go back home.</a>
    </p>
</body>
</html>