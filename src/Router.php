<?php

namespace App;


use App\Middleware\Middleware;
use App\Functions;


//This is the router. It routes the user throughout the webpage.
class Router {

    //An array that holds the route objects when created. 
    protected $routes = [];

    public function __construct(){}

    //Used for creating new routes. 
    public function add($method, $uri, $controller)
    {
        $this ->routes[] = 
        [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    //use for assigning middleware when creating routes.
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    //A get method call for data manipulation when it comes to using forms. 
    //get is for receiving new resources from a database for population. 
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }
    
    //A post method call for data manipulation when it comes to using forms. 
    //post is for submitting new resources. 
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }
    
    //A delete method call for data manipulation when it comes to using forms.
    //Delete is for removing resources.  
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    //A patch method call for data manipulation when it comes to using forms.
    //Patch if for updating resources. 
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }
    
    //A put method call for data manipulation when it comes to using forms. 
    //Put is for replacing entire resources. 
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    //Routes using a method and URI from the session request. 
    public function route($uri, $method) 
    {
        //Runs through the made routes. 
        foreach ($this->routes as $route){
            //Checks if routes are valid.
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                //checks if there is any middleware.
                if(isset($route['middleware'])){
                    //If so, it runs a middle ware check system. Sort of a mini router that checks session authentication. 
                    Middleware::resolve($route['middleware']);
                }
                //returns the route. 
                return require($route['controller']);
            }
        }
        //if no route was found, it 404's and sends you back to the index.
        Functions\abort();
    }
}
