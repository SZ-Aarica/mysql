<?php
$severdb = "localhost";
$userdb = "root";
$dbpass = "";
$db_name = "infodb";
$conn = "";

$conn = mysqli_connect($severdb,
                      $userdb,
                      $dbpass,
                      $db_name );

 if($conn){
    echo "you are connected";
}
?>