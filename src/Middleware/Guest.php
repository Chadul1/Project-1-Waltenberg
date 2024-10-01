<?php 

namespace App\Middleware;

//A class that represents a guest.
class Guest{
    //Checks to see if the user is valid for entering a page.
    public function handle()
    {
        if($_SESSION['user'] ?? false){
            echo '<meta http-equiv="refresh" content="0;url=../public/">';
            exit();
        }
    }
}