<?php
/**
 * This file captures the data in the addStudent.html file and send it to the database
 */


require '../database_conn_inc.php';

$firstName = "";
$lastName = "";
$studentNumber = "";

$firstName = $connection->real_escape_string($_POST['firstName']);
$lastName = $connection->real_escape_string($_POST['lastName']);
$studentNumber = $connection->real_escape_string($_POST['studentNumber']);

//SQL QUERY

$sqlInsert = "INSERT INTO students(student_Name, student_Surname, student_Number)
                VALUES('$firstName','$lastName','$studentNumber')";

//Send data to database

$result = $connection->query($sqlInsert);

if ($result != FALSE){
    echo "<br>Data was entered successfully. \"Message from send_Student_Data_inc.php file\" ";
}
else{
    echo "<br>Error: " . $connection->error;
}

$connection->close();
?>