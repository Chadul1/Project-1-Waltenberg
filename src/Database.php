<?php

//Sets the namespace for calling. 
namespace App;

//Grabs the use cases for database connection.
use PDO;
use PDOException;

//The database class that will be used for connecting to the database.
class Database {
    //The connection for the database. 
    private $connection;

    //The constructor for connecting to the database. 
    //grabs the config from the configuration file. The username is defaulted to root and the password to ''.
    public function __construct($config, $username = 'root', $password = '')
    {
        //using the config array file, the dsn connection is created using a build_query helper action. 
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        //the connection is created and set for fetching to help with defaulting errors when connecting. 
        $this->connection = new PDO($dsn, $username,$password ,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    //The query is used to create queries in the database. 
    public function query ($query, $params = []){ 
       
        //using a tru/catch, execute a query that was inputted using the connection property. Then we return the found information. 
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return  $statement;
        }
        catch (PDOException $e){
            //in case of error, we echo the message and return null. 
            echo $e->getMessage();
            return null;
        }
    }
}