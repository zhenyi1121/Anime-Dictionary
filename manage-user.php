<?php
session_start();
include('connection.php');
include('header.php');

// Fetch all users
$query = "SELECT NoIC, Username, NoTelephone, Email, Avatar FROM users ORDER BY NoIC ASC";
$result = mysqli_query($condb, $query);

// Delete user if requested
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteUser'])) {
    $noIC = mysqli_real_escape_string($condb, $_POST['NoIC']);

    // Fetch user avatar before deleting
    $avatarQuery = "SELECT Avatar FROM users WHERE NoIC = '$noIC'";
    $avatarResult = mysqli_query($condb, $avatarQuery);
    $user = mysqli_fetch_assoc($avatarResult);

    // Delete avatar file if exists
    if (!empty($user['Avatar']) && file_exists("upload/" . $user['Avatar'])) {
        unlink("upload/" . $user['Avatar']);
    }

    // Delete user
    $deleteQuery = "DELETE FROM users WHERE NoIC = '$noIC'";
    if (mysqli_query($condb, $deleteQuery)) {
        echo "<script>alert('User deleted successfully!'); window.location.href='manage-user.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.'); window.location.href='manage-user.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <style>
        .container {
            width: 1400px;
            margin: 20px auto;
            padding: 0px;
            font-size:20px;
        }
        .title-container {
            width: 1400px;
            padding: 20px;
            margin:0px auto;
            margin-bottom:0px;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center-align items vertically */
            gap: 10px; /* Add spacing between the h1 and the hr */
        }

        .title-container h1 {
            font-size: 40px; /* Adjust font size */
            margin: 0px; /* Remove default margin */
            vertical-align:middle;
            white-space: nowrap; /* Prevent text wrapping */
        }

        .title-container hr {
            flex-grow: 1; /* Allow the hr to fill the remaining space */
            height: 4px; /* Set the height of the line */
            background: black; /* Set the line color */
            border: none; /* Remove default border */
        }
        table {
            width: 100%;
            border-collapse: seperate;
            margin-top: 0px;
            background-color:white;
            border-radius:10px;
        }
        th, td {
            border: 3px solid black;
            padding: 10px;
            text-align: center;
            font-weight:normal;
            border-radius:10px;
        }
        th {
            background:rgb(0, 0, 0);
            color:white;
            font-weight:bold;
        }
        .edit-btn, .delete-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .edit-btn {
            background:rgb(11, 11, 11);
            color: white;
        }
        .delete-btn {
            background:rgb(144, 33, 33);
            color: white;
        }
        .edit-btn:hover {
            opacity:80%;
        }
        .delete-btn:hover {
            background: #cc0000;
        }
        @media (max-width: 768px) {
            .title-container {
                width: 650px;
                padding:20px 0px;
            }
            .container {
                width: 650px;
            }
            table {
                font-size: 10px;
                width:650px;
            }
            th, td {
                padding: 10px;
                margin:0px;
            }
            select, button {
                width:70px;
                margin-bottom:5px;
            }
        }
    </style>
</head>
<body>


<div class="title-container">
    <h1>USER LIST</h1><hr>
</div>
<div class="container">
    <table>
        <tr>
            <th>IC Number</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Avatar</th>
            <th>Actions</th>
        </tr>
        <?php while ($user = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= htmlspecialchars($user['NoIC']) ?></td>
                <td><?= htmlspecialchars($user['Username']) ?></td>
                <td><?= htmlspecialchars($user['NoTelephone']) ?></td>
                <td><?= htmlspecialchars($user['Email']) ?></td>
                <td>
                    <?php if (!empty($user['Avatar'])) { ?>
                        <img src="upload/<?= htmlspecialchars($user['Avatar']) ?>" width="50" height="50">
                    <?php } else { ?>
                        No Image
                    <?php } ?>
                </td>
                <td>
                    <form action="update-user.php" method="GET" style="display:inline;">
                        <input type="hidden" name="NoIC" value="<?= $user['NoIC'] ?>">
                        <button type="submit" class="edit-btn">Edit</button>
                    </form>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        <input type="hidden" name="NoIC" value="<?= $user['NoIC'] ?>">
                        <button type="submit" name="deleteUser" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>

<?php include("footer.php") ?>
