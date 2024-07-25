
<?php
include("database.php");
include("form.html");

function querry($username){
return  "SELECT * FROM `users`
         WHERE username = '{$username}'";
}


$username = null;
$password = null;

if(isset($_POST["logIn"])){
$username = filter_input(INPUT_POST , "username" , FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST , "password" , FILTER_SANITIZE_SPECIAL_CHARS);
if(!empty($username) && !empty($password)){
$sql = querry($username);
$result = mysqli_query($conn , $sql);
if(mysqli_num_rows($result)>0){
$row = mysqli_fetch_assoc($result);
if($row["password"] == $password){
   header("location:home.php");
}
}else{
    echo '<p style="font-size: 20px;"> you have not created an account <br> please make one first </p>'; 
}
} else{
    echo '<p style="font-size: 20px;"> username / password is empty </p>'; 
}

}
?>