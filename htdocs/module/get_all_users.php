<?php
    //Starting session
    session_start();

    //Checking if logged in as admin or not
    if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin"){
        
        //Importing database credential
        require_once '../db/credential.php';   

        // Create connection to database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        //Pagination page check
        include("pagination_top.php");
        
        
        //SQL Query
        $sql = "SELECT * FROM users WHERE type='user' limit $start_from, $rows_per_page";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered table-hover">';

            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<tr><td>'. $row["username"] . '</td><td><a href="../pages/update_user.php?username=' 
                . $row["username"] . '">Update</a></td><td><a href="../module/delete_user.php?username=' 
                . $row["username"] . '">Delete</a></td></tr>';            
            }
            echo "</table><br>";

            //Pagination Query
            $sql_rows = "SELECT * FROM users WHERE type='user'";

            //Pagination bottm
            include("pagination_bottom.php");
        }
        else {
            //No user exists
            echo '<br><h3>No user exists.</h3>';
        }

        //Close connection to databse
        $conn->close();

    } else {
        //If a non-admin tries to access this script
        echo '<b>You have to logged in as administrator to be able to perform this task.</b>';
        echo '<a href="localhost">Home</a>';
    }
?>