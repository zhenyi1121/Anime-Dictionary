<?php
include ('connection.php');

if (isset($_GET['id'])) {
    $noIC = $_GET['id'];

    // Fetch user avatar
    $query = "SELECT Avatar FROM users WHERE NoIC = '$noIC'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user['Avatar']) {
        unlink("upload/" . $user['Avatar']); // Delete avatar file
    }

    $deleteQuery = "DELETE FROM users WHERE NoIC = '$noIC'";

    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: user-list.php?msg=User deleted successfully");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>
