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
        <form id="loginForm" onsubmit="return user_login();"> <!-- Added onsubmit to call user_login -->
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="email" id="email" required>
                <box-icon type='solid' name='user'></box-icon>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" id="password" required>
                <box-icon name='lock-alt' type='solid'></box-icon>
            </div>
            <div class="remember-forgot">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div><?php echo isset($msg) ? $msg : ''; ?></div> <!-- Display error message -->
            <div class="register-link">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script>
        function user_login() {
            jQuery('.field_error').html(''); // Clear previous error messages

            var email = jQuery("#email").val(); // Corrected this line
            var password = jQuery("#password").val();
            var isError = '';

            if (email === '') {
                jQuery('#email_error').html('Please Enter Email');
                isError = 'yes';
            }
            if (password === '') {
                jQuery('#password_error').html('Please Enter Password');
                isError = 'yes';
            }

            if (isError === '') {
                jQuery.ajax({
                    url: 'login_submit.php',
                    type: 'POST',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(result) {
                        if (result.trim() === 'login_success') {
                            window.location.href = 'index.php'; // Redirect to index page
                        } else if (result.trim() === 'invalid_login') {
                            alert('Invalid login credentials.');
                        } else {
                            alert('Login failed: ' + result);
                        }
                    }
                });
            }
            return false; // Prevent form submission
        }
    </script>
</body>
</html>
