<?php 

//Using the router that is fed through the index. We instantiate the routes and add them to the router class. 
$router->get("/Week-1-Project-Waltenberg/public/","../src/Controllers/HomeController.php"); 
$router->get("/Week-1-Project-Waltenberg/public/register","../src/Controllers/registration/RegisterController.php");
//Posts are for submitting information. Think forms and other user data. 
$router->post("/Week-1-Project-Waltenberg/public/register","../src/Controllers/registration/RegisterStore.php")->only("guest");
$router->get("/Week-1-Project-Waltenberg/public/login","../src/Controllers/session/LoginCreate.php"); 
$router->post("/Week-1-Project-Waltenberg/public/login","../src/Controllers/session/LoginStore.php");
//Delete is for logging out of and destroying the session.  
$router->delete("/Week-1-Project-Waltenberg/public/logout","../src/Controllers/session/LoginDestroy.php"); 
$router->get("/Week-1-Project-Waltenberg/public/settings","../src/Controllers/settings/SettingSet.php");
//The "only" tag is set so none logged in users cannot access the game.
$router->get("/Week-1-Project-Waltenberg/public/game","../src/Controllers/game/start.php")->only("auth");