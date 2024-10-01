<?php 

// view that takes the user information and if it's valid, it's then added to the database. 
// add namespaces. 
namespace App;

use App\Functions;
use App;
use PDOException;

use Logger\LoggerFactory; 

$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has submitted the login form.');


//require view 
require('../src/Views/RegisterView.php');

//Require database config.
$config = require_once __DIR__ ."/../../../src/config.php";

//Set up  error validation. 
$errors = [];


//grab the elements for form validation and database querying.
$username = $_POST['username'];
$password = $_POST['password'];


//try to see if the information already exists in the database.
try {
    //Set up config and add needed data elements (Username/password)
    $db = new Database($config['database']);

    //find username to test if there is a match.
    $user = $db->query('select * from accounts where username = :username', [
         ':username' => $username,
    ])->fetch();

    $logger->info('The database was contacted to search for username');
}
catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

if (! $user) {
    $errors = [
        'username'=> 'No matching account found with that username',
    ];
    $logger->warning('No username was found.');
    $_SESSION['errors'] = $errors;
    echo '<meta http-equiv="refresh" content="0;url=../public/login" method="POST">';
    exit();
}

//Verifies the password against the hash. If it works, it works
if (password_verify($password, $user['password'])) {
    App\functions\login([
        'username' => $username,
    ]);
    $logger->info('The password was valid and the user was logged in.');
    echo '<meta http-equiv="refresh" content="0;url=../public/" method="POST">';
    exit();

} else {
    $errors = [ 
        'password'=> 'Incorrect password!',
    ];
    $logger->info('The inputted password was invalid.');
    $_SESSION['errors'] = $errors;
    echo '<meta http-equiv="refresh" content="0;url=../public/login" method="POST">';
    exit();
}