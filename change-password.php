<?php
session_start();
include('connection.php');
include('header.php');

// Ensure user is logged in
if (!isset($_SESSION['NoIC'])) {
    die("<script>alert('Unauthorised access, Please log in.');
    window.location.href='index.php';</script>");
}

$NoIC = $_SESSION['NoIC'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = trim($_POST["old_password"]);
    $newPassword = trim($_POST["new_password"]);
    $confirmPassword = trim($_POST["confirm_password"]);

    // Check if the new password exceeds 6 characters
    if (strlen($newPassword) != 6) {
        die("<script>alert('New passowrd needs to 6 characters long.');
            window.location.href='change-password.php';</script>");
    } elseif ($newPassword !== $confirmPassword) {
        die("<script>alert('New passowrd and confirm new password not same!');
            window.location.href='change-password.php';</script>");
    } else {
        // Fetch the current password from the database
        $query = "SELECT Password FROM users WHERE NoIC = ?";
        $stmt = mysqli_prepare($condb, $query);
        mysqli_stmt_bind_param($stmt, "s", $NoIC);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $storedPassword);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($storedPassword !== $oldPassword) {
            die("<script>alert('Old password is incorrect.');
            window.location.href='change-password.php';</script>");
        } else {
            // Update the password
            $updateQuery = "UPDATE users SET Password = ? WHERE NoIC = ?";
            $updateStmt = mysqli_prepare($condb, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "ss", $newPassword, $NoIC);
            $updateSuccess = mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt);

            if ($updateSuccess) {
                echo "<script>alert('Password changed successfully!'); window.location.href='view-profile.php';</script>";
                exit();
            } else {
                $message = "Error updating password. Please try again.";
            }
        }
    }
}
mysqli_close($condb);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"> 
    <style>
        .form-container {
            width: 50%;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .title-container hr {
            flex-grow: 1; /* Allow the hr to fill the remaining space */
            height: 4px; /* Set the height of the line */
            background: black; /* Set the line color */
            border: none; /* Remove default border */
        }

        .title-container h2 {
            font-size: 30px; /* Adjust font size */
            margin: 0; /* Remove default margin */
            white-space: nowrap; /* Prevent text wrapping */
            text-align: center;
        }


        .title-container {
            margin-top:0px;
            margin-bottom:10px;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center-align items vertically */
            gap: 10px; /* Add spacing between the h1 and the hr */
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .show-password {
            font-size:16px;
            font-weight:normal;
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        label {
            font-weight: bold;
            font-size:20px;
        }

        input[type="password"], input[type="text"] {
            width: 97%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-submit {
            width:100%;
            background: black;
            margin: 10px 0px 10px 0px;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            font-family: 'Kollektif', sans-serif;
            font-size:20px;
        }

        .btn-submit:hover {
            background: rgb(46, 46, 46);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="title-container">
            <hr><h1>CHANGE PASSWORD</h1><hr>
        </div>
        <form method="POST" action="">
            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" id="old_password" name="old_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" placeholder="Need 6 digit" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Need 6 digit" required>
            </div>
            <div class="show-password">
                <input type="checkbox" id="show-password" onclick="togglePassword()">
                <label for="show-password">Show Password</label>
            </div>
            <button type="submit" class="btn-submit">Change Password</button>
        </form>
    </div>
    
    <script>
        function togglePassword() {
        var passwordFields = document.querySelectorAll("#old_password, #new_password, #confirm_password");
        var checkbox = document.getElementById('show-password');

        passwordFields.forEach(function (field) {
            if (checkbox.checked) {
                field.setAttribute("type", "text");
            } else {
                field.setAttribute("type", "password");
            }
        });
    }
    </script>
</body>

    

</html>

<?php include('footer.php'); ?>
