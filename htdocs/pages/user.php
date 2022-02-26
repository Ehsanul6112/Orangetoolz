<?php 
    //Starting session
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <?php include_once("../style/style.php"); //Importing bootstrap?>
    </head>
    <body>
    <div class="container">
    <?php
    //Checking if the user is logged in or not
    if(isset($_SESSION["username"])){
        
        echo "<h1>Welcome " . $_SESSION["username"] . "!</h1><br>";

        //Counting Files, Groups and Contacts
        echo '
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Total Files: 0</td>
                    <td>Total Groups: 0</td>
                    <td>Total Contacts: 0</td>
                </tr>
            </table>
            <br>
        ';
        
        //Upload file
        echo '
            <br>
            <div class="row">
                <form action="../module/upload_file.php" enctype="multipart/form-data" method="post">
                    <h3>Upload file</h3>
                    <label class="sr-only">File Upload</label>
                    <div class="col-lg-4">
                        <input class="form-control" type="file" name="file"><br>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-md btn-primary" value="Import" type="submit" name="submit">Upload</button>
                    </div>
                </form>
            </div>
            <br><br>
        ';
    

        include '../module/logout.php';      

    } else{
        //If a non-user then show warning
        echo "<b>You have to login as a user to get access to this page.<b>";
        echo '<a href="../index.php">Home</a>';
    }
    ?>
    </div>
    </body>
</html>