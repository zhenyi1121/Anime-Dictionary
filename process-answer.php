<?php
session_start();

if (!isset($_SESSION['questions']) || !isset($_SESSION['current_question'])) {
    header("Location: join-quiz.php");
    exit();
}

$questions = $_SESSION['questions'];
$currentIndex = $_SESSION['current_question'];
$selectedAnswer = $_POST['answer'] ?? '';

if ($selectedAnswer === $questions[$currentIndex]['correctAnswer']) {
    $_SESSION['score']++; // Increase score if correct
}

// Move to the next question
$_SESSION['current_question']++;

if ($_SESSION['current_question'] >= count($questions)) {
    header("Location: quiz-results.php"); // Redirect if quiz finished
} else {
    header("Location: quiz.php"); // Go to next question
}
exit();
?>
