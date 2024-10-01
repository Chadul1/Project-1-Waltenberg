<?php 

namespace App\Middleware;

//A class that helps with middleware usage.
class Middleware {
    //A dictionary containing the Users. 
    public const MAP = [
        "guest"=> Guest::class,
        "auth"=> Auth::class
    ];

    //Finds the users and returns them if the Key is valid. 
    public static function resolve($key) 
        {    
        //Checks if the key is null.
        if(!$key) {
            return;
        }

        //finds the class using the Key.
        $middleware = static::MAP[$key] ?? false;

        //If the middleware doesn't exist, then it throws an error.
        if (!$middleware){
            throw new \Exception("No matching middleware found for the key. '$key'.");
        }

        //If the error is not thrown, then the user is returned.
        (new $middleware())->handle();

    }
}

