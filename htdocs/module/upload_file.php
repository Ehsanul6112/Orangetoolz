<?php
include_once("../db/credential.php");

// Create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST["submit"])){
    if($_FILES['file']['name']){
        $filename =  explode(".", $_FILES['file']['name']);
        if($filename[1] == "csv"){
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while($data = fgetcsv($handle)){
                $item1 = mysqli_real_escape_string($conn, $data);
            }
        }
    }
}

?>