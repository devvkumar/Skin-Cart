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
        <form id="registerForm" action="register.php" method="post" onsubmit="return user_register();">
            <h1>Sign Up</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" id="name" name="name">
                <box-icon type='solid' name='user'></box-icon>
            </div>
            <span class="field_error" id="name_error"></span>

            <div class="input-box">
                <input type="email" placeholder="Email" id="email" name="email" required>
                <box-icon type='solid' name='user'></box-icon>
            </div>
            <span class="field_error" id="email_error"></span>

            <div class="input-box">
                <input type="text" placeholder="Mobile No" id="mobileno" name="mobileno" required>
                <box-icon type='solid' name='user'></box-icon>
            </div>
            <span class="field_error" id="mobieno_error"></span>

            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="password" required>
                <box-icon name='lock-alt' type='solid'></box-icon>
            </div>
            <span class="field_error" id="password_error"></span>

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

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function user_register() {
            jQuery('.field_error').html(''); // Clear previous error messages
            var name = jQuery("#name").val();
            var email = jQuery("#email").val();  // Corrected this line
            var mobileNo = jQuery("#mobileno").val();
            var password = jQuery("#password").val();
            var cpassword = jQuery("#cpassword").val();
            var isError = '';

            if (name === '') {
                jQuery('#name_error').html('Please Enter User Name');
                isError = 'yes';
            }
            if (email === '') {
                jQuery('#email_error').html('Please Enter Email');
                isError = 'yes';
            }
            if (mobileNo === '') {
                jQuery('#mobieno_error').html('Please Enter Mobile Number');
                isError = 'yes';
            }
            if (password === '') {
                jQuery('#password_error').html('Please Enter Password');
                isError = 'yes';
            }
            if (password !== cpassword) {
                jQuery('#password_error').html('Passwords do not match');
                isError = 'yes';
            }

            if (isError === '') {
                jQuery.ajax({
                    url: 'register.php',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        mobileno: mobileNo,
                        password: password
                    },
                    success: function(result) {
                        if (result.trim() === 'email_present') {
                            jQuery('#email_error').html('Email already exists');
                        } else if (result.trim() === 'insert') {
                            alert('Registration successful!');
                            window.location.href = 'login.php'; // Redirect to login page
                        } else {
                            alert('Registration failed: ' + result);
                        }
                    }
                });
            }
            return false; // Prevent form submission
        }
    </script>
</body>
</html>
