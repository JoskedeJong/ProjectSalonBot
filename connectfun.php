<?php
    
    function createdb(){
        
        $host= $_ENV['DATABASE_HOST'];
        $dbname= $_ENV['DATABASE_NAME'];
        $user= $_ENV['DATABASE_USERNAME'];
        $password= $_ENV['DATABASE_PASSWORD'];
        $port= $_ENV['DATABASE_PORT'];
        return pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    }
    
?>
