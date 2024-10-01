<?php 


// view that takes the user information and if it's valid, it's then added to the database. 
// add namespaces. 
namespace App;

use App\Functions;
use App;
use PDOException;
use Logger\LoggerFactory; 


$logger = LoggerFactory::getInstance()->getLogger();
$logger->info('The user has submitted their account registration.');


//require view 
require('../src/Views/RegisterView.php');

//Require database config.
$config = require_once __DIR__ ."/../../../src/config.php";

//Set up  error validation. 
$errors = [];


//grab the elements for form validation and database querying.
$username = $_POST['username'];
$password = $_POST['password'];


//validates the username and password.
$validateName = Functions\validateUsername($username);
$validatePassword = Functions\validatePassword($password);

if ($validateName === true) {
} else {
     $errors['username'] = $validateName;
     $logger->warning('The inputted username wasn\'t valid.');
}

if($validatePassword === true) {
} else {
     $errors['password'] = $validatePassword;
     $logger->warning('The inputted password wasn\'t valid.');
}

if (! empty($errors)) {
     $_SESSION['errors'] = $errors;

     echo '<meta http-equiv="refresh" content="0;url=../public/register" method="POST">'; 
     exit();
}

//try to see if the information already exists in the database.
try {
     //Set up config and add needed data elements (Username/password)
     $db = new Database($config['database']);

     //find username to test if there is a match.
     $result = $db->query('select * from accounts where username = :username', [
          ':username' => $username,
     ])->fetch();
}
catch (PDOException $e) {
     echo $e->getMessage();
}

//Checks to see if the username already exists. 
if ($result) {
     $errors['username'] = "Account already exists with that username, please choose another.";
     $_SESSION['errors'] = $errors;
     $logger->warning('The account name already existed.');
     echo '<meta http-equiv="refresh" content="0;url=../public/register" method="POST">';
     exit();
} else {
     $db->query('INSERT INTO accounts(username, password) VALUES(:username, :password)', [
          'username'=> $username,
          'password' => password_hash($password, PASSWORD_DEFAULT),
     ]);

     $logger->info('The account was added.');

     Functions\login([
          'username' => $username,
     ]);

     echo '<meta http-equiv="refresh" content="0;url=../public">';
}

exit();

