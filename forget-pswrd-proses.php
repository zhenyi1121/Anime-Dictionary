<?php
session_start();
include('connection.php'); // Include database connection

// Check if email is set in the POST request
if (!empty($_POST['email'])) {
    // Remove blank spaces from the front and back of the user input
    $email = trim($_POST['email']);

    // Fetch user data from the database
    $query_verify = "SELECT * FROM users WHERE email = '$email'";
    $query_match = mysqli_query($condb, $query_verify);

    // Check if the query executed successfully
    if (!$query_match) {
        die("<script>
            alert('Database query failed: " . mysqli_error($condb) . "');
            window.location.href='login-page.php';
        </script>");
    }

    // If a matching record is found
    if (mysqli_num_rows($query_match) == 1) {
        // Fetch the matched data
        $m = mysqli_fetch_assoc($query_match);

        // Retrieve the forgotten password
        $forgotten_password = $m['Password'];

        // Ensure the password is safely escaped for JavaScript
        $escaped_password = htmlspecialchars($forgotten_password, ENT_QUOTES, 'UTF-8');

        // Display the password in a pop-up message and redirect to the login page
        echo "<script>
            alert('Your password is: $escaped_password');
            window.location.href='login-page.php';
        </script>";
    } else {
        // No matching record found
        echo "<script>
            alert('No account found with this email. Please try again.');
            window.location.href='login-page.php';
        </script>";
    }
} else {
    // Empty input
    echo "<script>
        alert('Please enter your email!');
        window.location.href='login-page.php';
    </script>";
}
?>
