<?php 
require "../database_conn_inc.php";

if(isset($_POST['submit'])){

    $student_ID = $_GET['student_ID'];
    //SQL Query

    //$sqlDelete = "DELETE FROM students WHERE student_ID = " . "'" . $_GET['student_ID'] . "'". ";" ;
    $sqlDelete = "DELETE FROM students WHERE student_ID = ?" ;
    $stmt = $connection->prepare($sqlDelete);
    $stmt->bind_param("s", $student_ID);
    if($stmt->execute()){
        echo "Record deleted";
        $stmt->close();

    };

}

?>

<!DOCTYPE html>

<head>
    <title>Delete Student</title>
</head>

<body>

<h1>Delete Student</h1>

<form action = "delete_Student.php" method = "POST">
<?php 

//require "../database_conn_inc.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//SQL Query


if (isset($_GET['student_ID'])){

    $sqlSelect = "SELECT student_Name, student_Surname, student_Number FROM students WHERE student_ID = " . "'". $_GET['student_ID'] ."'". ";" ;
    
    if ($result = $connection->query($sqlSelect)){

        while($row = $result->fetch_assoc()){

            
            echo "<p>Do you want to delete this record? </p>";
           
            echo $row['student_Name'] . " " . $row['student_Surname'] . " " . $row['student_Number'] ;
            echo "<br>";
        }

    }
    else{
        echo "Query failed";
    }

}
else{
    echo "No ID gotten";
}

?>
<input type = "submit" value = "Yes">
<a href = "students.php">Cancel</a>
</form>


</body>
</html>