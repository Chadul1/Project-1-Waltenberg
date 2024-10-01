<?php 

namespace App\Middleware;

//The class that represents an authorized User. In this case, A logged in User. 
class Auth {
    
    //Checks to see if the user is valid for entering a page.
    public function handle()
    {
        if(! $_SESSION['user'] ?? false) {
            echo '<meta http-equiv="refresh" content="0;url=../public/">';
            exit();
        }
    }
}