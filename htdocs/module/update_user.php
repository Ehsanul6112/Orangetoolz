<?php
    //Starting session
    session_start();

    //Checking if logged in as admin or not
    if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin"){
        
        //Getting the username to be deleted
        $usr = $_POST["username"];
        $pass = $_POST["password"];
        echo $pass;
        $blocked = $_POST["blocked"];

        //Importing database credential
        require_once '../db/credential.php';   

        // Create connection to database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        //Determining SQL Query   
        $sql="";

        if(empty($pass) == false && empty($blocked) == false){
            $newPass = sha1($pass); //Encrypting password
            $sql = "UPDATE users SET password='$newPass', blocked=TRUE WHERE username='$usr'";
        } elseif(empty($pass) == false && empty($blocked) == true){
            $newPass = sha1($pass); //Encrypting password
            $sql = "UPDATE users SET password='$newPass', blocked=FALSE WHERE username='$usr'";
        } elseif(empty($pass) == true && empty($blocked) == false){
            $sql = "UPDATE users SET blocked=TRUE WHERE username='$usr'";
        } else{
            $sql = "UPDATE users SET blocked=FALSE WHERE username='$usr'";
        }

        //Executing query and updating selected user
        if ($conn->query($sql) === TRUE) {
            //Redirect to the dashboard
            header("Location: ../pages/admin.php");
            die();
        } else {
            //Handling error
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