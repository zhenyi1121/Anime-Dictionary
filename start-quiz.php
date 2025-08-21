<?php
session_start();
include ('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['NoIC'])) {
        die("<script>alert('Unauthorised access, Please log in.');
        window.location.href='index.php';</script>");
    }

    $animeID = $_POST['animeID'];
    $difficulty = $_POST['difficulty'];
    $_SESSION['quiz_start_time'] = time(); // Store start time

    // Fetch questions
    $query = "SELECT q.QuestionID, q.Question, q.correctAnswer, q.choice1, q.choice2, q.choice3, q.choice4, z.QuizID
              FROM questions q 
              INNER JOIN quiz z ON q.QuizID = z.QuizID
              WHERE z.AnimeID = '$animeID' AND z.Difficulty = '$difficulty'
              ORDER BY RAND()
              LIMIT 10"; 

    $result = mysqli_query($condb, $query);

    if ($result) {
        $questions = [];
        $quizID = null; // Initialize QuizID

        while ($row = mysqli_fetch_assoc($result)) {
            $questions[] = $row;
            $quizID = $row['QuizID']; // Store QuizID from the first row
        }

        if (!empty($questions) && $quizID !== null) {
            $_SESSION['questions'] = $questions;
            $_SESSION['current_question'] = 0;
            $_SESSION['score'] = 0;
            $_SESSION['QuizID'] = $quizID; // Store QuizID

            header("Location: quiz.php");
            exit();
        } else {
            die("<script>alert('Question still drafting.....look forward to your next visit.');
            window.location.href='join-quiz.php';</script>");
        }
    } else {
        die("<script>alert('Error occured when fetching data.');
        window.location.href='join-quiz.php';</script>") . mysqli_error($condb);
    }
} else {
    die("Invalid access!");
}
?>
