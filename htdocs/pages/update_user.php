<?php
    //Starting session
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
        <?php include_once("../style/style.php") ;//Importing bootstrap?>
    </head>
    <body>
    <div class="container">

    <?php
    //Checking if logged in as admin or not
    if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin"){
        
        //Getting the username to be updated
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
        $sql = "SELECT * FROM users WHERE username='$usr'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {
                //Checking if user is blocked or not and setting the form
                $block_check = "";
                $block_value = "blocked";

                if($row["blocked"] == true){
                    $block_check = "checked";
                    $block_value = "blocked";
                }

                //Showing updated form based on current user's specifications
                echo '
                    <div class="row">
                        <h2>Update </h2>
                        <form action="../module/update_user.php" method="post">
                            <div class="col-lg-4">
                                <label class="sr-only" for="username">Username:</label><br>
                                <input class="form-control" placeholder="Username" type="text" id="username" name="username" value="' . $usr . '" readonly>
                                <label class="sr-only" for="password">New Password:</label>
                                <input class="form-control" type="text" id="password" name="password" autofocus><br>
                                <input type="checkbox" id="blocked" name="blocked" value="' . $block_value . '" ' . $block_check . '>
                                <label for="blocked">Block</label><br><br>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                    <br><br>
                    <a href="admin.php"> << Back</a>
                ';
            }            
        }
        else {
            //No user exists
            echo '<h3>No such user exists.</h3><br>';
            echo '<a href="admin.php">Back</a>';
        }

        //Close connection to databse
        $conn->close();
    
    } else {
        //If a non-admin tries to access this script
        echo '<b>You have to logged in as administrator to be able to perform this task.</b>';
        echo '<a href="localhost">Home</a>';
    }
    ?>



        





    </div>
    </body>
</html>


