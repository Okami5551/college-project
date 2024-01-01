<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="log.css">

</head>
<body>

<div id="bg"></div>
<?php

if(isset($_POST['sub'])){
$user = $_POST['username'];
$pass = $_POST['password'];




include 'connect.php';
$sql = "select * from users where username='$user' and password='$pass'";
$query = mysqli_query($conn,$sql);
$rslt = mysqli_fetch_assoc($query);
$row_num = mysqli_num_rows($query);
if($row_num == 1){
    $_SESSION['id']= $rslt['id'];
    $_SESSION['username']= $rslt['name'];
    $_SESSION['level']= $rslt['level'];

    header('location:index.html');
}else{
    echo "error";
}
}



    ?>


<form action="log.php" method="post"> 
   <div class="form-field">
    <input type="text" name="username" placeholder="Username" required/>
  </div>
  
  <div class="form-field">
    <input type="password" name="pass" placeholder="Password" required/>                         </div>
  
  <div class="form-field">
    <button class="btn" type="submit" name="sub">Log in</button>
  </div>
</form>

  
</body>
</html>
