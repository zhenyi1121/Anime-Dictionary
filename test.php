<?php
session_start();
include ('connection.php');
include ('header.php');
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
                width:60%;
                margin:20px
            }
        }
    </style>
</head>
<body>

<div class="result-container">
    <h2>Quiz Completed!</h2><hr style="border:3px solid black;">
    <p class="score">Your Score: 10/10</p>
    <p class="time-taken">Time Taken: 00.00.15</p>
    <a href="index.php" class="home-btn">Return to Home</a>
</div>

</body>
</html>


<?php include('footer.php') ?>