<?php 
/**
 * electives.php
 * This file has a table for listing the electives from the database.
 * Author: Sonwabile Gxoyiya (219267189)
 * Date: 4 October 2021
 */
require "../database_conn_inc.php";

?>

<!DOCTYPE html>

<head>
    <title>Electives</title>
</head>
<body>
    <!--Link to pages -->
    <button type = "button" onclick = "document.location = 'addElective.html'">Add Student</button>
    <p>Display a list of Electives</p>

    <!--Table of Electives-->
    <table>
        <thead>
            <tr>
                <th>Elective Name</th>
                <th>Elective Code</th>
                <th>Pricing</th>
                <th colspan = 2>Update/Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            
            //SQL Statement
            $sqlSelect = "SELECT * FROM electives";
            $results = $connection->query($sqlSelect);

            if ($results != FALSE && $results->num_rows > 0){
                while($row = $results->fetch_assoc()){

                    echo "<tr>"
                    ."<td>" . $row['elective_Name'] . "</td>"
                    ."<td>" . $row['elective_Code'] . "</td>"
                    ."<td>" . $row['elective_Pricing'] . "</td>"
                    ."<td>" . "<input type = \"button\" value = \"Edit\">" . "</td>"
                    ."<td>" . "<input type = \"button\" value = \"Delete\">" . "</td>"
                    ."</tr>";
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