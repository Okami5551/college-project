<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration </title> 
  <link rel="stylesheet" href="sign.css">
</head>
<body>
<?php
$ms5 = $ms6 = "";
if (isset($_POST['sub'])) {
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password2 = $_POST['pass2'];

    if ($password != $password2) {
        $ms5 = 'Mismatched passwords';
    } else {
        include 'connect.php';
        $sql1 = "SELECT username FROM users WHERE username = '$username'";
        $query = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($query) == 1) {
            $ms6 = "Username is already used";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $id = mt_rand(10, 99);
            $sql = "INSERT INTO users (id, username, email, password) VALUES ('$id','$username', '$email', '$hashedPassword')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo '<script>';
                echo 'alert("Thank you for registration!");';
                echo 'window.location.href ="log.php";';
                echo '</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="sign.css">
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="sign.php" method="post">
            <div class="input-box">
                <input type="text" placeholder="Enter your username" required name="user" id="user">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Enter your email" required name="email" id="email">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Create password" required name="pass" id="pass">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm password" required name="pass2" id="pass2">
            </div>

            <div class="input-box button">
                <input type="submit" value="Register Now" name="sub">
                <?php echo $ms5 . " " . $ms6; ?>
            </div>
            <div class="text">
                <h3>Already have an account? <a href="log.php">Login now</a></h3>
            </div>
        </form>
    </div>
</body>

</html>
