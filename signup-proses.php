<?php
session_start();
include('connection.php'); // Include database connection
include('function.php');  // Include helper functions

// Check if username, password, and other required fields are set in the POST request
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['noic']) && !empty($_POST['notelephone']) && !empty($_POST['email'])) {
    // Fetch user input and sanitize
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $noic = trim($_POST['noic']);
    $notelephone = trim($_POST['notelephone']);
    $email = trim($_POST['email']);

    // Validate NoIC and password length
    if (strlen($noic) != 12) {
        die("<script>alert('NoIC must be exactly 12 characters long.');
        window.location.href='signup-page.php';</script>");
    }

    if (strlen($password) != 6) {
        die("<script>alert('Password must be 6 characters long.');
        window.location.href='signup-page.php';</script>");
    }

    // Check for existing username in the database
    $query_check = "SELECT * FROM users WHERE Username = '" . $username . "'";
    $check_result = mysqli_query($condb, $query_check);

    if (mysqli_num_rows($check_result) > 0) {
        // Username already exists
        die("<script>alert('Username already exists. Please choose a different username.');
        window.location.href='signup-page.php';</script>");
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Set the default avatar path
        $default_avatar = "default-avatar.png";  // Adjust path as needed

        // Insert the new user into the database with the default avatar
        $query_insert = "INSERT INTO users (NoIC, Username, Password, NoTelephone, Email, Avatar) 
                         VALUES ('$noic', '$username', '$hashed_password', '$notelephone', '$email', '$default_avatar')";

        if (mysqli_query($condb, $query_insert)) {
            // Registration successful
            $_SESSION['Username'] = $username;
            $_SESSION['NoIC']     = $noic;
            $_SESSION['Avatar']   = $default_avatar;  // Store default avatar in session
            $_SESSION['identity'] = "user";

            echo "<script>alert('Registration successful! Redirecting to user menu...');
            window.location.href='user-homepage.php';</script>";
        } else {
            // Database error during insertion
            die("<script>alert('Error registering user. Please try again later.');
            window.location.href='signup-page.php';</script>");
        }
    }
} else {
    // If input is empty
    die("<script>alert('Please fill in all required fields.');
    window.location.href='signup-page.php';</script>");
}
?>
