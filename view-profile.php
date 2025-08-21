<?php
session_start();
include('connection.php'); 
include ('header.php');

// Ensure user is logged in
if (!isset($_SESSION['NoIC'])) {
    die("<script>alert('Unauthorised access, Please log in.');
    window.location.href='index.php';</script>");
}

$NoIC = $_SESSION['NoIC']; // Get user ID from session

// Fetch user data, including avatar file name
$query = "SELECT Username, NoTelephone, Email, Avatar FROM users WHERE NoIC = ?";
$stmt = mysqli_prepare($condb, $query);
mysqli_stmt_bind_param($stmt, "s", $NoIC);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $username = htmlspecialchars($row['Username']);
    $phone = htmlspecialchars($row['NoTelephone']);
    $email = htmlspecialchars($row['Email']);
    $avatar = htmlspecialchars($row['Avatar']); // Stored file name
} else {
    die("<script>alert('User Proflie Not Found.');
        window.location.href='index.php';</script>");
}

$historyQuery = "
    SELECT q.QuizID, a.AnimeTitle, q.Difficulty, r.Score, r.TimeTaken, r.DateAttempt
    FROM result r
    INNER JOIN quiz q ON r.QuizID = q.QuizID
    INNER JOIN anime a ON q.AnimeID = a.AnimeID
    WHERE r.NoIC = '$NoIC' 
    LIMIT 10"; // Show last 10 quiz attempts

$historyResult = mysqli_query($condb, $historyQuery);

mysqli_stmt_close($stmt);
mysqli_close($condb);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet"> 
    <style>
        .profile-container {
            width: 60%;
            margin: 40px auto;
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
            margin-top: 10px;
            text-align:center;
            line-height:100%
        }

        .edit-btn:hover {
            background:rgb(46, 46, 46);
        }

        .history {
            max-width: 600px;
            padding: 20px;
            margin: 0px auto;
            border-radius: 10px;
            text-align: center;
        }

        .history table {
            width: 100%;
            border-collapse: collapse;
        }

        .history th, .history td {
            border: 2px solid black;
            padding: 10px;
            text-align: center;
        }

        .history th {
            background: black;
            color: white;
        }

        @media (max-width: 768px) {
            .profile-container {
                width: 90%; /* Reduce width for better fit */
                padding: 15px;
            }

            .profile-container h2{
                margin-bottom:40px;
            }

            .profile-card {
                flex-direction: column; /* Stack items vertically */
                align-items: center;
                text-align: center;
            }

            .profile-info {
                margin: 0;
                align-items: center;
            }

            .profile-card img {
                width: 200px; /* Reduce avatar size */
                height: 200px;
                margin-top: 15px;
            }

            .button-container {
                flex-direction: column; /* Stack buttons */
                align-items: center;
                gap: 5px;
            }

            .edit-btn {
                width: 100%; /* Make buttons full-width */
                padding: 12px;
            }

            .history {
                width: 100%; /* Ensure history table fits */
                padding: 0px;
            }

            .history table {
                font-size: 14px; /* Reduce table font size */
            }

            .history th, .history td {
                padding: 8px;
            }
        }

    </style>
</head>
<body>
    <div class="profile-container">
        <h2><?php echo $username; ?></h2>
        <div class="profile-card">
            <div class="profile-info">
                <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <hr style="color:none; margin-bottom:70px;margin-top:-10px;">
                <a href="edit-profile.php" class="edit-btn">Edit Profile</a>
                <a href="change-password.php" class="edit-btn">Change Password</a>
            </div>
                <?php 
                $avatarPath = !empty($avatar) ? "upload/$avatar" : "default-avatar.png";
                ?>
                <img src="<?php echo $avatarPath; ?>" alt="Profile Avatar" class="profile-avatar">
        </div>
        <hr style="border:2px solid black;border-radius:10px;margin:20px 0px;">
        <div class="history">
                <h2 style="font-size:35px; margin-bottom:10px; margin-top:0px;">QUIZ HISTORY</h2>
                <hr style="border:2px solid black; margin-bottom:20px;">

                <table>
                    <tr>
                        <th>Anime</th>
                        <th>Difficulty</th>
                        <th>Score</th>
                        <th>Time Taken</th>
                        <th>Date Attempt</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($historyResult) > 0) {
                        while ($row = mysqli_fetch_assoc($historyResult)) {
                            echo "<tr>
                                    <td>{$row['AnimeTitle']}</td>
                                    <td>{$row['Difficulty']}</td>
                                    <td>{$row['Score']}</td>
                                    <td>{$row['TimeTaken']}</td>
                                    <td>{$row['DateAttempt']}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No quiz history available</td></tr>";
                    }
                    ?>
                </table>
        </div>

    </div>
</body>
</html>



<?php include('footer.php') ?>
