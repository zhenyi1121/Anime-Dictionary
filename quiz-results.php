<?php
session_start();
include ('connection.php');
include ('header.php');

// Ensure required session variables are available
if (!isset($_SESSION['score'], $_SESSION['questions'], $_SESSION['NoIC'], $_SESSION['QuizID'], $_SESSION['quiz_start_time'])) {
    die("<script>alert('Error Occurred: Please rejoin the quiz.');
    window.location.href='join-quiz.php';</script>");
}

$noIC = $_SESSION['NoIC'];
$quizID = $_SESSION['QuizID'];
$score = $_SESSION['score'];
$totalQuestions = count($_SESSION['questions']);
$timeTakenSeconds = time() - $_SESSION['quiz_start_time'];

// Convert seconds to HH:MM:SS format
$timeTaken = gmdate("H:i:s", $timeTakenSeconds);

// Check if QuizID exists before inserting
$checkQuiz = "SELECT QuizID FROM quiz WHERE QuizID = ?";
$stmtCheck = $condb->prepare($checkQuiz);
$stmtCheck->bind_param("s", $quizID);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows == 0) {
    die("<script>alert('Error: QuizID does not exist.');
    window.location.href='join-quiz.php';</script>");
}
$stmtCheck->close();

// Insert user result into the database
$insertQuery = "INSERT INTO result (NoIC, QuizID, Score, TimeTaken, DateAttempt) VALUES (?, ?, ?, ?, CURDATE())";
$stmt = $condb->prepare($insertQuery);

if (!$stmt) {
    die("Prepare failed: " . $condb->error);
}

$stmt->bind_param("ssis", $noIC, $quizID, $score, $timeTaken);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

// Close database connection
$stmt->close();
$condb->close();

// Clear session data after saving results
unset($_SESSION['questions'], $_SESSION['score'], $_SESSION['QuizID'], $_SESSION['quiz_start_time']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        .result-container {
            width: 600px;
            margin: auto;
            padding: 30px 50px;;
            border: 5px solid #333;
            border-radius: 10px;
            background:rgb(255, 255, 255);
            text-align:center;
        }
        h2 {
            margin-top:0px;
            color: rgb(0, 0, 0);
            font-size:40px;
        }
        .score {
            font-size: 38px;
            font-weight: bold;
            color:rgb(0, 0, 0);
            margin-bottom:-10px;
        }
        .time-taken {
            font-size: 30px;
            color:rgb(82, 82, 82);
        }
        .home-btn {
            display: inline-block;
            margin-top: 40px;
            padding: 10px 20px;
            background:rgb(0, 0, 0);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size:28px;
        }
        .home-btn:hover {
            background:rgb(71, 71, 71);
        }
        @media (max-width: 768px) {
            .result-container {
                width:368px;
                margin:20px auto;
            }
        }
    </style>
</head>
<body>

<div class="result-container">
    <h2>Quiz Completed!</h2><hr style="border:3px solid black;">
    <p class="score">Your Score: <?php echo $score; ?> / <?php echo $totalQuestions; ?></p>
    <p class="time-taken">Time Taken: <?php echo $timeTaken; ?></p>
    <a href="join-quiz.php" class="home-btn">Return to Join Quiz</a>
</div>

</body>
</html>


<?php include('footer.php') ?>