<?php 
include '_db.php';
include 'function.php';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobileno']) && isset($_POST['password'])) {
    $name = get_safe_value($conn, $_POST['name']);
    $email = get_safe_value($conn, $_POST['email']);
    $mobileno = get_safe_value($conn, $_POST['mobileno']);
    $password = get_safe_value($conn, $_POST['password']);

    // Check if the email is already registered
    $query = "SELECT * FROM user WHERE email = '$email'";
    $user_check = mysqli_query($conn, $query);

    if (!$user_check) {
        echo 'Error in SQL query: ' . mysqli_error($conn);
        exit();
    }

    if (mysqli_num_rows($user_check) > 0) {
        echo "email_present";
    } else {
        $insert_query = "INSERT INTO user (username, email, mobileno, password) VALUES ('$name', '$email', '$mobileno', '$password')";
        $insert_result = mysqli_query($conn, $insert_query);

        if (!$insert_result) {
            echo 'Error in SQL insert: ' . mysqli_error($conn);
        } else {
            echo "insert";
        }
    }
} else {
    echo "All fields are required.";
}
?>
