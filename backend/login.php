<?php
include 'backend/_db.php';

$msg = '';
if (isset($_POST["submit"])) {
    $username = get_safe_value($conn, $_POST["username"]);
    $password = get_safe_value($conn, $_POST["password"]);
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

   

    if ($count > 0) {
        
        $_SESSION['ADMIN_LOGIN'] = 'yes';
        $_SESSION['ADMIN_USER'] = $username;
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        header('Location: main.php'); // Redirect to main.php
        exit(); // Use exit instead of die
    } else {
        $msg = "Enter correct password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <video id="background-video" autoplay loop muted>
        <source src="media/2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="wrapper">
        <form method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" required>
                <box-icon type='solid' name='user'></box-icon>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <box-icon name='lock-alt' type='solid'></box-icon>
            </div>
            <div class="remember-forgot">
                <label for=""><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div><?php echo $msg; ?></div> <!-- Display error message -->
            <div class="register-link">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
</body>
</html>
