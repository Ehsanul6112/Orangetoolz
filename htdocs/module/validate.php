<!DOCTYPE html>
<html>
<head>
    <title>Validate</title>
</head>
<body>
<?php
    $usr = $_POST["username"];
    $pass = $_POST["password"];
   
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
    $sql = "SELECT * FROM users WHERE username='$usr' AND password ='$newPass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["type"] == "user" && $row["blocked"] == 0){
            
            //Starting a session
            session_start();
            $_SESSION["username"] = $usr;
            
            //Redirect to the user dashboard
            header("Location: ../pages/user.php");
            die();

        }
        elseif($row["type"] == "user" && $row["blocked"] == 1){
            //Showing alert
            echo "You have been blocked by the admin. <br>";
            echo '<a href="../index.php">Home</a>';
            
        }
        else{
            
            //Starting a session
            session_start();
            $_SESSION["username"] = "admin";      

            //Redirect to the admin dashboard
            header("Location: ../pages/admin.php");
            die();

        }
    }
    } else {
        //Showing alert
        echo "Wrong credentials or user does not exists. <br>";
        echo '<a href="../index.php">Home</a>';
    }

    //Close connection to databse
    $conn->close();
?>
</body>
</html>