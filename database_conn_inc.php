<?php 

/**
 * database_conn_inc.php
 * This file is used to connect to the database
 * Author: Sonwabile Gxoyiya
 * Date: 22 October 2021
 */

 
 const DB_SERVER = "localhost";
 const DB_USERNAME = "root";
 const DB_PASSWORD = "";
 const DATABASE = "ess_db";

/*connect to database*/

$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);

if ($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}
else {
    echo "Connection Made. ";
}

//Testing the connection by retrieving data
?>