<?php
session_start();
include('connection.php');
include('header.php');

// Fetch all quizzes with associated anime titles
$query = "SELECT q.QuizID, q.Difficulty, a.AnimeTitle 
          FROM Quiz q 
          LEFT JOIN Anime a ON q.AnimeID = a.AnimeID
          ORDER BY q.QuizID ASC";
$result = mysqli_query($condb, $query);

// Delete quiz if requested
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteQuiz'])) {
    $quizID = mysqli_real_escape_string($condb, $_POST['quizID']);
    $deleteQuery = "DELETE FROM Quiz WHERE QuizID = '$quizID'";

    if (mysqli_query($condb, $deleteQuery)) {
        echo "<script>alert('Quiz deleted successfully!'); window.location.href='manage-quizzes.php';</script>";
    } else {
        echo "<script>alert('Error deleting quiz.'); window.location.href='manage-quizzes.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Quizzes</title>
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
                width: 570px;
            }
            .container {
                width: 95%;
            }
            table {
                font-size: 14px;
            }
            select, button {
                width:100px;
            }
        }
    </style>
</head>
<body>

<div class="title-container">
    <h1>SET QUIZZES</h1><hr>
</div>
<div class="container">
    <table>
        <tr>
            <th>Quiz ID</th>
            <th>Difficulty</th>
            <th>Anime</th>
            <th>Actions</th>
        </tr>
        <?php while ($quiz = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= htmlspecialchars($quiz['QuizID']) ?></td>
                <td><?= htmlspecialchars($quiz['Difficulty']) ?></td>
                <td><?= htmlspecialchars($quiz['AnimeTitle'] ?? 'Unknown') ?></td>
                <td>
                    <form action="edit-quiz.php" method="POST" style="display:inline;">
                        <input type="hidden" name="quizID" value="<?= $quiz['QuizID'] ?>">
                        <button type="submit" class="edit-btn">Edit</button>
                    </form>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                        <input type="hidden" name="quizID" value="<?= $quiz['QuizID'] ?>">
                        <button type="submit" name="deleteQuiz" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>

<?php include("footer.php")?>