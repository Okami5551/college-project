<?php
$conn = mysqli_connect("localhost" , "root" , "" , "pc_store");
if($conn ===false){
    die("error" . mysqli_connect_error());
}
?>