<?php
    //Starting session
    session_start();

    //Checking if logged in as admin or not
    if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin"){
        
        //Getting the username to be deleted
        $usr = $_GET["username"];

        //Importing database credential
        require_once '../db/credential.php';   

        // Create connection to database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        //SQL Query   
        $sql = "DELETE FROM users WHERE username='$usr'";

        if ($conn->query($sql) === TRUE) {
            //Redirect to the dashboard
            header("Location: ../pages/admin.php");
            die();
        } else {
            echo "Error deleting record: " . $conn->error;
            echo '<a href="../pages/admin.php">Back</a>';
        }

        //Close connection to databse
        $conn->close();
    } else {
        //If a non-admin tries to access this script
        echo '<b>You have to logged in as administrator to be able to perform this task.</b>';
        echo '<a href="localhost">Home</a>';
    }
?>