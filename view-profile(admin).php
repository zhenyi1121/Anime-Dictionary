<?php
session_start();
include('connection.php'); 
include ('header.php');

// Ensure user is logged in
if (!isset($_SESSION['AdminID'])) {
    die("<script>alert('Unauthorised access, Please log in.');
    window.location.href='index.php';</script>");
}

$adminid = $_SESSION['AdminID']; // Get user ID from session

// Fetch user data, including avatar file name
$query = "SELECT AdminID, Name, Admin_email, Avatar FROM admin WHERE AdminID = ?";
$stmt = mysqli_prepare($condb, $query);
mysqli_stmt_bind_param($stmt, "s", $adminid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $username = htmlspecialchars($row['Name']);
    $email = htmlspecialchars($row['Admin_email']);
    $avatar = htmlspecialchars($row['Avatar']); // Stored file name
} else {
    die("<script>alert('User profile not found.');
    window.location.href='admin-homepage.php';</script>");
}

mysqli_stmt_close($stmt);
mysqli_close($condb);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
        .profile-container {
            width: 60%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2{
            Font-size:40px;
            margin-top:0;
            margin-bottom:0px;
        }

        .profile-card{
            display: flex;
            align-items: center; /* Vertically centers content */
            justify-content: space-between; /* Keeps spacing even */
            font-weight:normal;
            font-size:20px;
            gap:20px;
        }

        .profile-info {
            flex: 1; /* Take up available space */
            display: flex; /* Enables flexbox */
            flex-direction: column; /* Stack content vertically */
            justify-content: space-between; /* Push elements apart */
            margin-top: 30px;
            margin-right: 50px;
            line-height:20%;
        }

        .profile-card img {
            width: 320px;
            height: 320px;
            border-radius: 50%;
            margin: 0;
            float:right;
        }

        .button-container {
            margin-top: auto; /* Pushes buttons to the bottom */
            display: flex;
            gap: 10px; /* Adds spacing between buttons */
        }


        .edit-btn {
            display: inline-block;
            padding: 15px 20px;
            background:black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight:bold;
            margin-top: 30px;
            text-align:center;
            line-height:100%
        }

        .edit-btn:hover {
            background:rgb(46, 46, 46);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2><?php echo $username; ?></h2>
        <div class="profile-card">
            <div class="profile-info">
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <a href="edit-profile.php" class="edit-btn">Edit Profile</a>
                <a href="change-password.php" class="edit-btn">Change Password</a>
            </div>
                <?php 
                $avatarPath = !empty($avatar) ? "upload/$avatar" : "default-avatar.png";
                ?>
                <img src="<?php echo $avatarPath; ?>" alt="Profile Avatar" class="profile-avatar">
        </div>
    </div>
</body>
</html>



<?php include('footer.php') ?>
