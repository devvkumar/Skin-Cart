
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
        <source src="media/1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="wrapper">
        <form action="signup.php" method="post">
            <h1>Sign Up</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" id="username" name="username" required>
                <box-icon type='solid' name='user'></box-icon>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="password" required>
                <box-icon name='lock-alt' type='solid'></box-icon>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" required>
                <box-icon name='lock-alt' type='solid'></box-icon>
            </div>
            <button type="submit" class="btn">Sign Up</button>
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>

    <?php
    if ($showAlert) {
        echo '
        <div class="popup">
	        <div class="popup__container">
		        <p class="popup__message">Successfully created an account.</p>
		        <a href="#" class="popup__close invisible-text">Close</a>
	        </div>
        </div>';
    }
    ?>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="script.js"></script>
</body>
</html>
