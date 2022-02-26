<?php

  //Starting session
  session_start();

  //Checking if a non-admin is trying to access this script or not
  if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin"){
    
    //Getting the username and password
    $usr = $_POST['username'];
    $pass = $_POST['password'];

    //Importing database credential
    require_once '../db/credential.php';

    // Create connection to database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    //Encrypting password to sha1
    $newPass = sha1($pass);

    //SQL Query
    $sql = "INSERT INTO users (username, password, type, blocked) VALUES ('$usr', '$newPass', 'user', FALSE)";

    //Creating new user
    if ($conn->query($sql) === TRUE) {
      echo "New user '$usr' has been created.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //Close connection to databse
    $conn->close();

    //Redirect to the admin dashboard
    header("Location: ../pages/admin.php");
    die();
    
  } else{
      //If a non-admin tries to access this script
      echo '<b>You have to logged in as administrator to be able to perform this task.</b>';
      echo '<a href="localhost">Home</a>';
  }

?>