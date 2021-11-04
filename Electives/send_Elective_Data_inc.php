<?php 
/**
 * send_Elective_Data_inc.php
 * This file captures the data from the addElective.html file and sends the data to the Elective table.
 * Author: Sonwabile Gxoyiya (219267189) 
 * Date: 4 October 2021
 */

 require '../database_conn_inc.php';

 $electiveID = "";
 $electiveName = "";
 $electiveCode = "";
 $electivePricing = "";

 $electiveID = $connection->real_escape_string(uniqid());
 $electiveName = $connection->real_escape_string($_POST['electiveName']);
 $electiveCode = $connection->real_escape_string($_POST['electiveCode']);
 $electivePricing = $connection->real_escape_string($_POST['electivePricing']);

 //SQL QUERY

 $sqlInsert = "INSERT INTO electives(elective_ID, elective_Name, elective_Code, elective_Pricing)
                VALUES('$electiveID','$electiveName','$electiveCode','$electivePricing')";

//Send Data to database

$result = $connection->query($sqlInsert);

if ($result != FALSE){
    echo "<br>Data was entered successfully. \"Message from send_Elective_Data_inc.php file\" ";
    echo "<br>Generated Id: " . $connection->insert_id;
}
else{
    echo "<br>Error: " . $connection->error;
}

$connection->close();

?>