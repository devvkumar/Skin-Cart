<?php

session_start();
 unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_USER']);
 header('location: login.php'); // Redirect to another page
 die();

?>