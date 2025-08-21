<?php
session_start();
include('connection.php'); // Include database connection

// Check if username and password are set in the POST request
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    // Remove blank spaces from the front and back of the user input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Fetch database data
    $query_login = "SELECT * FROM admin 
                    WHERE Name = '$username' 
                    AND Password = '$password'";

    // Compare data
    $query_match = mysqli_query($condb, $query_login);

    // If record matches
    if (mysqli_num_rows($query_match) == 1) {
        // Fetch matched data
        $m = mysqli_fetch_array($query_match);

        // Set SESSION variables
        $_SESSION['Name']         = $m['Name'];
        $_SESSION['AdminID']      = $m['AdminID'];
        $_SESSION['Admin_email']  = $m['Admin_email'];
        $_SESSION['Avatar']       = $m['Avatar']; // Store avatar path in session
        $_SESSION['identity']     = "admin";

        // Redirect to index.php
        echo "<script>window.location.href='admin-homepage.php';</script>";
    } else {
        // Login failed
        die("<script>alert('Incorrect Username/Password.');
        window.location.href='admin-login-page.php';</script>");
    }
} else {
    // Empty input
    die("<script>alert('Please do not leave blank!');
    window.location.href='admin-login-page.php';</script>");
}
?>
