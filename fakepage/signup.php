<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css" />
</head>
<body>
  <div class="container">
       <form action="signup.php" method="post">
        <label for="username">username:</label><br />
        <input type="text" name="username" class="username" /> <br />
        <label for="password">password:</label><br />
        <input type="text" name="password1" /><br />
         <label for="password">repeat password:</label><br />
        <input type="text" name="password2" /><br />
        <input type="submit" value="Sing Up" name="signUp" class="signUp" /><br />
      </form>
      </div>
</body>
</html>
<?php 

function querrySelect($username){
return  "SELECT * FROM `users`
         WHERE username = '{$username}'";
}
function querryInsert($username , $password){
 return "INSERT INTO `users`(`username`, `password`) 
 VALUES ('{$username}','{$password}')";
}
$username = null;
$password1 = null;
$password2 = null;

if(isset($_POST["signUp"])){
  $username = filter_input(INPUT_POST , "username" , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password1 = filter_input(INPUT_POST , "password1" , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password2 = filter_input(INPUT_POST , "password2" , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(!empty($username) ){
  $sqlselect = querrySelect($username);
  $result = mysqli_query($conn , $sqlselect);
  if(mysqli_num_rows($result) != 0){
    echo '<p style="font-size: 20px;">you have already registerd </p>'; 
  } else{
    if(!empty($password1) && !empty($password2)){
       if($password1 == $password2){
         $sqlInsert = querryInsert($username , $password2);
         mysqli_query($conn , $sqlInsert);
         echo "new record added";
         header("location:index.php");
       } else{
         echo "passwors are not the same";
       }
    }else{
      echo "pass is empty";
    }

  }
}else{
  echo '<p style="font-size: 20px;"> username is empty </p>'; 

}
}
?>