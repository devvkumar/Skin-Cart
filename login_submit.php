<?php
include '_db.php';
include 'function.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = get_safe_value($conn, $_POST['email']);
    $password = get_safe_value($conn, $_POST['password']);

    // Check if the email and password match an existing user
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $user_check = mysqli_query($conn, $query);

    if (!$user_check) {
        echo 'Error in SQL query: ' . mysqli_error($conn);
        exit();
    }

    if (mysqli_num_rows($user_check) > 0) {
        $row = mysqli_fetch_assoc($user_check);
        session_start(); // Start session
        $_SESSION['USER_LOGIN'] = 'yes';
        $_SESSION['USER_NAME'] = $row['username'];
        echo "login_success"; // Indicate successful login
    } else {
        echo "invalid_login"; // Indicate invalid login credentials
    }
} else {
    echo "All fields are required.";
}
?>
