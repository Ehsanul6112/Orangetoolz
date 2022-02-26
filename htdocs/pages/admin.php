<?php 
    //Starting session
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <?php include_once('../style/style.php'); //Importing bootstrap?>
    </head>
    <body>
        <div class="container">

<?php
//Checking if a non-admin is trying to access this script or not
if(isset($_SESSION["username"]) && ($_SESSION["username"] == "admin")){
    echo '  <h1>Welcome Admin</h1>
            
            <h3>Create New User</h3>
            <form action="../module/create_user.php" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="sr-only" for="username">Username:</label>
                        <input class="form-control" placeholder="Username" type="text" id="username" name="username" autofocus>
                    </div>
                    <div class="col-lg-4">    
                        <label class="sr-only" for="password">Password:</label>
                        <input class="form-control" placeholder="Password" type="password" id="password" name="password">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Create User</button>
                    </div>
                </div>
            </form>

            <div>
                <h3>List of Users</h3>
        ';
        include '../module/get_all_users.php';
    
        echo "</div><br>";

        include '../module/logout.php';      
} else{
    //If a non-admin tries to access
    echo "<b>You have to login as administrator to get access to this page.<b>";
    echo '<a href="../index.php">Home</a>';
}
?>
        </div>
    </body>
</html>