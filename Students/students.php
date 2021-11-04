<?php

require "../database_conn_inc.php";

?>
<!DOCTYPE html>

<head>
    <title>Students</title>
</head>

<body>
    
<!--Links to other pages-->
<!--<a href = "addStudent.html" >Add Student</a>-->
<button type = "button" onclick = "document.location = 'addStudent.html'">Add Student</button>
<!-- 
<input type = "button" value = "Update Student">
<input type = "button" value = "Delete Student">
-->

<!--List the Students from Database in a Table Format-->
<p>Displays a list of tables</p>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>SurName</th>
            <th>Student Number</th>
            <th colspan = 2>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
        


        <?php

            //SQL Statement
            $sqlSelect = "SELECT * FROM students";
            $result = $connection->query($sqlSelect);

            if ($result != FALSE && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    
                        echo "<tr>" 
                        ."<td>". $row['student_Name'] . "</td>" 
                        . "<td>" . $row['student_Surname'] . "</td>" 
                        . "<td>" . $row['student_Number'] ."</td>"
                        . "<td>" . "<input type = \"button\" value = \"Edit\">" . "</td>"
                        . "<td>" . "<a href = 'delete_Student.php?student_ID=" . $row['student_ID'] . "'>Delete</a>". "</td>"
                        . "</tr>";
                    }
                    
                
            }
            else{
                echo "<tr>"
                ."<td colspan = 3> No Data </td>"
                ."</tr>";
            }

        ?>

    </tbody>
</table>

</body>



</html>