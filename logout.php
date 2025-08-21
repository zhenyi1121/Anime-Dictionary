<?php
session_start(); // Start session to access session variables

if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    // Destroy all session data
    session_unset();  // Unset all session variables
    session_destroy(); // Destroy the session

    // Redirect to the home page or login page after logging out
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <script>
        function confirmLogout() {
            const userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                window.location.href = "logout.php?confirm=yes";
            }
            else{
                window.location.href = "index.php";
            }

        }
    </script>
</head>
<body>
    <script>
        // Automatically ask the user to confirm logout when the page loads
        confirmLogout();
    </script>
</body>
</html>
