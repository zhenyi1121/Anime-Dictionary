<?php
session_start();
include('connection.php');
include('header.php');

if (!isset($_POST['quizID']) && !isset($_GET['quizID'])) {
    echo "<script>alert('Invalid Quiz!'); window.location.href='manage-quizzes.php';</script>";
    exit;
}

$quizID = isset($_POST['quizID']) ? $_POST['quizID'] : $_GET['quizID'];

// Fetch quiz details
$quizQuery = "SELECT * FROM Quiz WHERE QuizID = '$quizID'";
$quizResult = mysqli_query($condb, $quizQuery);
$quiz = mysqli_fetch_assoc($quizResult);

// Fetch all questions for this quiz
$questionQuery = "SELECT * FROM questions WHERE QuizID = '$quizID'";
$questionResult = mysqli_query($condb, $questionQuery);

// Update quiz details & questions
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateQuiz'])) {
    $difficulty = mysqli_real_escape_string($condb, $_POST['difficulty']);
    $animeID = mysqli_real_escape_string($condb, $_POST['animeID']);

    // Update quiz
    $updateQuizQuery = "UPDATE Quiz SET Difficulty = '$difficulty', AnimeID = '$animeID' WHERE QuizID = '$quizID'";
    mysqli_query($condb, $updateQuizQuery);

    // Update questions
    foreach ($_POST['questions'] as $questionID => $questionData) {
        $questionText = mysqli_real_escape_string($condb, $questionData['text']);
        $correctAnswer = mysqli_real_escape_string($condb, $questionData['correctAnswer']);
        $choice1 = mysqli_real_escape_string($condb, $questionData['choice1']);
        $choice2 = mysqli_real_escape_string($condb, $questionData['choice2']);
        $choice3 = mysqli_real_escape_string($condb, $questionData['choice3']);
        $choice4 = mysqli_real_escape_string($condb, $questionData['choice4']);

        $updateQuestionQuery = "UPDATE questions SET 
            Question = '$questionText', 
            correctAnswer = '$correctAnswer', 
            choice1 = '$choice1', 
            choice2 = '$choice2', 
            choice3 = '$choice3', 
            choice4 = '$choice4'
            WHERE QuestionID = '$questionID'";
        mysqli_query($condb, $updateQuestionQuery);
    }

    echo "<script>alert('Quiz updated successfully!'); window.location.href='manage-quizzes.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz</title>
    <style>
        .container {
            width: 1000px;
            margin: 40px auto;
            background: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .title-container {
            width: 100%;
            padding: 0px;
            margin: 0px auto;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .title-container h1 {
            font-size: 40px;
            margin: 0px;
            white-space: nowrap;
        }
        .title-container hr {
            flex-grow: 1;
            height: 4px;
            background: black;
            border: none;
        }
        label {
            display: block;
            margin-top: 10px;
            font-size: 18px;
            color:white;
        }
        input, select, textarea, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            border-radius: 5px;
            border: none;
        }
        input, select, textarea {
            background:rgb(255, 255, 255);
            border:2px solid black;
            border-radius:5px;
            max-width:950px;
            color: black;
        }
        button {
            font-family: 'Kollektif', sans-serif;
            background: rgb(0, 0, 0);
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            padding: 15px 15px;
            font-size: 20px;
        }
        button:hover {
            opacity: 80%;
        }
        .cancel-btn {
            background: rgb(181, 20, 20);
            font-weight: bold;
        }
        .cancel-btn:hover {
            background: #cc0000;
        }
        @media (max-width: 768px) {
            .container {
                width:80%;
            }
            input, select, textarea {
                background:rgb(255, 255, 255);
                border:2px solid black;
                border-radius:5px;
                max-width:95.5%;
                color: black;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title-container">
        <h1>EDIT QUIZ</h1><hr>
    </div>
    
    <form method="POST">
        <input type="hidden" name="quizID" value="<?= $quizID ?>">

        <label>Difficulty:</label>
        <select name="difficulty">
            <option value="Easy" <?= $quiz['Difficulty'] == 'Easy' ? 'selected' : '' ?>>Easy</option>
            <option value="Normal" <?= $quiz['Difficulty'] == 'Normal' ? 'selected' : '' ?>>Normal</option>
            <option value="Hard" <?= $quiz['Difficulty'] == 'Hard' ? 'selected' : '' ?>>Hard</option>
        </select>

        <label>Anime:</label>
        <select name="animeID">
            <?php
            $animeQuery = "SELECT * FROM Anime";
            $animeResult = mysqli_query($condb, $animeQuery);
            while ($anime = mysqli_fetch_assoc($animeResult)) {
                echo "<option value='{$anime['AnimeID']}' " . ($quiz['AnimeID'] == $anime['AnimeID'] ? 'selected' : '') . ">{$anime['AnimeTitle']}</option>";
            }
            ?>
        </select>

        <h3>Questions</h3>
        <?php while ($question = mysqli_fetch_assoc($questionResult)) { ?>
            <div style="margin-top: 15px; background:rgb(0, 0, 0); padding: 10px; border-radius: 5px;">
                <label>Question:</label>
                <textarea name="questions[<?= $question['QuestionID'] ?>][text]" rows="2" required><?= $question['Question'] ?></textarea>

                <label>Correct Answer:</label>
                <input type="text" name="questions[<?= $question['QuestionID'] ?>][correctAnswer]" value="<?= $question['correctAnswer'] ?>" required>

                <label>Choice 1:</label>
                <input type="text" name="questions[<?= $question['QuestionID'] ?>][choice1]" value="<?= $question['choice1'] ?>" required>

                <label>Choice 2:</label>
                <input type="text" name="questions[<?= $question['QuestionID'] ?>][choice2]" value="<?= $question['choice2'] ?>" required>

                <label>Choice 3:</label>
                <input type="text" name="questions[<?= $question['QuestionID'] ?>][choice3]" value="<?= $question['choice3'] ?>" required>

                <label>Choice 4:</label>
                <input type="text" name="questions[<?= $question['QuestionID'] ?>][choice4]" value="<?= $question['choice4'] ?>" required>
            </div>
        <?php } ?>

        <button type="submit" name="updateQuiz">Update Quiz</button>
        <button type="button" class="cancel-btn" onclick="window.location.href='manage-quizzes.php'">Cancel</button>
    </form>
</div>

</body>
</html>

<?php include('footer.php'); ?>
