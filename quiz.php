<?php
session_start();
include ('connection.php');
include ('header.php');

if (!isset($_SESSION['questions']) || !isset($_SESSION['current_question'])) {
    header("Location: join-quiz.php"); // Redirect if no quiz started
    exit();
}

$questions = $_SESSION['questions'];
$currentIndex = $_SESSION['current_question'];

if ($currentIndex >= count($questions)) {
    header("Location: quiz-results.php"); // Redirect to results page
    exit();
}

$question = $questions[$currentIndex];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        .quiz-container {
            background: #000;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: auto;
            text-align: center;
            font-family: 'Kollektif', sans-serif;
        }

        .quiz-container h2 {
            font-size:30px;
            margin-bottom:-10px;
            gap:0;
        }
        .quiz-container p {
            font-size:34px;
            margin-bottom:30px;
        }

        .quiz-container form {
            display: flex;
            flex-direction: column;
            gap: 5px;
            font-weight:normal;
            font-size:18px;
            text-align:left;
        }
        button {
            padding: 10px;
            border-radius:10px;
            border: none;
            background: white;
            color: black;
            cursor: pointer;
            font-size:20px;
            font-weight:bold;
            font-family: 'Kollektif', sans-serif;
            
        }
        button:hover {
            background-color: lightgrey;
        }

        input[type="radio"] {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .quiz-container {
                margin:10px auto;
            }
        }
    </style>
</head>
<body>

<div class="quiz-container">
    <h2>Question <?php echo $currentIndex + 1; ?></h2>
    <p><?php echo htmlspecialchars($question['Question']); ?></p>
    
    <form method="POST" action="process-answer.php">
        <?php
        $choices = [
            $question['choice1'], 
            $question['choice2'], 
            $question['choice3'], 
            $question['choice4']
        ];
        shuffle($choices); // Randomize answer order

        foreach ($choices as $choice) {
            echo '<label><input type="radio" name="answer" value="'.htmlspecialchars($choice).'" required> '.htmlspecialchars($choice).'</label><br>';
        }
        ?>
        <button type="submit">Next</button>
    </form>
    
</div>

</body>
</html>
<?php include('footer.php')?>