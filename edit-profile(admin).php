<?php
session_start();
include('connection.php'); 
include('header.php');

// Ensure user is logged in
if (!isset($_SESSION['AdminID'])) {
    die("<script>alert('Unauthorised access! Please login.');
    window.location.href='index.php';</script>");
}

$AdminID = $_SESSION['AdminID']; // Get user ID from session

// Fetch user data
$query = "SELECT Name, Admin_email, Avatar FROM admin WHERE AdminID = ?";
$stmt = mysqli_prepare($condb, $query);
mysqli_stmt_bind_param($stmt, "s", $AdminID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $Name = htmlspecialchars($row['Name']);
    $Admin_email = htmlspecialchars($row['Admin_email']);
    $avatar = htmlspecialchars($row['Avatar']); // Stored file name
} else {
    die("<script>alert('User Profile not found');
    window.location.href='user-homepage.php';</script>");
}

mysqli_stmt_close($stmt);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_Name = $_POST['Name'];
    $new_Admin_email = $_POST['Admin_email'];
    $new_avatar = $avatar; // Keep existing avatar by default

    // Handle file upload if a new image is selected
    if (!empty($_FILES['avatar']['name'])) {
        $target_dir = "upload/"; // Folder to store images
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            die("Error: File is not an image.");
        }

        // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            die("Error: Only JPG, JPEG, and PNG files are allowed.");
        }

        // Move file to uploads folder
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $new_avatar = basename($_FILES["avatar"]["name"]); // Store file name
        } else {
            die("Error uploading file.");
        }
    }

    // Update user details in the database
    $update_query = "UPDATE admin SET Name = ?, Admin_email = ?, Avatar = ? WHERE AdminID = ?";
    $update_stmt = mysqli_prepare($condb, $update_query);
    mysqli_stmt_bind_param($update_stmt, "ssss", $new_Name, $new_Admin_email, $new_avatar, $AdminID);

    if (mysqli_stmt_execute($update_stmt)) {
        $_SESSION['success_msg'] = "Profile updated successfully!";
        echo "<script>alert('Profile updated successfully!');
        window.location.href='view-profile(admin).php';</script>";
        exit();
    } else {
        die("Error updating profile: " . mysqli_error($condb));
    }

    mysqli_stmt_close($update_stmt);
}

mysqli_close($condb);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .profile-container {
            width: 70%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size:20px;
        }

        .profile-header{
            max-width:650px;
            margin-top:10px;
            margin-bottom:40px;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center-align items vertically */
            gap: 10px; /* Add spacing between the h1 and the hr */
        }

        .profile-header h2 {
            font-size: 40px; /* Adjust font size */
            margin: 0; /* Remove default margin */
            white-space: nowrap; /* Prevent text wrapping */
        }

        .profile-header hr {
            flex-grow: 1; /* Allow the hr to fill the remaining space */
            height: 4px; /* Set the height of the line */
            background: black; /* Set the line color */
            border: none; /* Remove default border */
        }
        

        .profile-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-top:0px;
        }

        .profile-form label {
            font-weight: bold;
        }

        .profile-form input {
            width: 80%;
            padding: 8px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-avatar-container {
            flex: 0.4;
            display: flex;
            flex-direction:column; /* Stack elements in a column */
            align-items: center; /* Aligns items horizontally */
            gap: 10px; /* Adds space between text and image */
            margin-left:-30px;
        }
        

        .profile-avatar-container img {
            width: 250px;
            height: 250px;
            border-radius: 10px;
            float:right;
        }

        .save-btn {
            background: black;
            color: white;
            padding: 15px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            width:82%;
            font-size:20px;
            font-family: 'Kollektif', sans-serif;
        }

        .save-btn:hover {
            background: rgb(46, 46, 46);
        }
        @media (max-width: 768px) {
            .profile-container {
                width: 90%; /* Reduce width for smaller screens */
                flex-direction: column; /* Stack form and avatar vertically */
                align-items: center;
                padding: 15px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
                max-width: 100%;
                gap: 5px;
            }

            .profile-header h2 {
                font-size: 30px; /* Reduce header font size */
            }

            .profile-header hr {
                width: 60%;
            }

            .profile-form {
                width: 100%; /* Expand form width */
                align-items: center;
            }

            .profile-form input {
                width: 100%; /* Full-width inputs */
            }

            .profile-avatar-container {
                width: 100%; /* Make the avatar section full width */
                margin: 20px 0;
                align-items: center;
            }

            .profile-avatar-container img {
                width: 180px; /* Reduce avatar size */
                height: 180px;
            }

            .save-btn {
                width: 100%; /* Full-width button */
                padding: 12px;
                font-size: 18px;
            }
        }


    </style>
</head>
<body>
    <div class="profile-container">
        <form class="profile-form" method="POST" enctype="multipart/form-data">
        <div class="profile-header">
            <h2>Edit Profile</h2><hr>
        </div>
            <label for="Name">Name:</label>
            <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>" required>

            <label for="Admin_email">Admin_email:</label>
            <input type="Admin_email" id="Admin_email" name="Admin_email" value="<?php echo $Admin_email; ?>" required>

            <label for="avatar">Upload New Avatar:</label>
            <input type="file" id="avatar" name="avatar" accept="upload/*">

            <button type="submit" class="save-btn">Save Changes</button>
        </form>

        <div class="profile-avatar-container">
            <label>Current Avatar:</label>
            <img src="<?php echo !empty($avatar) ? "upload/$avatar" : "default-avatar.png"; ?>" alt="Profile Avatar">
        </div>
    </div>
</body>
</html>

<?php include('footer.php'); ?>


