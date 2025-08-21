<?php
session_start();
include ('connection.php');
include ('header.php');

// Fetch distinct anime titles
$animeQuery = "SELECT DISTINCT a.animeTitle, a.AnimeID FROM anime a INNER JOIN quiz q ON a.AnimeID = q.AnimeID ORDER BY a.animeTitle";
$animeResult = mysqli_query($condb, $animeQuery);

// Fetch distinct difficulty levels
$difficultyQuery = "SELECT DISTINCT Difficulty FROM quiz ORDER BY FIELD(Difficulty, 'Easy', 'Normal', 'Hard')";
$difficultyResult = mysqli_query($condb, $difficultyQuery);

// Fetch leaderboard data (default to show top scores of any quiz)
$leaderboardQuery = "
    SELECT users.Username, result.Score, result.TimeTaken 
    FROM result
    INNER JOIN users ON result.NoIC = users.NoIC
    ORDER BY result.Score DESC, result.TimeTaken ASC
    LIMIT 10"; // Top 10 players

$leaderboardResult = mysqli_query($condb, $leaderboardQuery);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .join-quiz{
            max-width: 1400px;
            margin: 0px auto;
            padding: 0px;
            text-align: left; /* Aligns all text content to the left */
            font-size:25px;
        }

        .title-container {
            width:1400px;
            margin:20px auto;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .title-container h1 {
            font-size: 40px;
            margin: 0;
            white-space: nowrap;
        }
        .title-container hr {
            flex-grow: 1;
            height: 4px;
            background: black;
            border: none;
        }

        .quiz-leaderboard-container {
            display: row; /* Aligns quiz and leaderboard side by side */
            gap: 20px; /* Space between them */
            align-items: center; /* Align to top */
        }


        .quiz {
            background:rgb(0, 0, 0);
            padding: 50px 70px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
            color:white;
            margin:0px auto;
            flex:2;
        }

        .leaderboard {
            background: white;
            max-width: 600px;
            padding:40px;
            margin:20px auto;
            border-radius:10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0px;
        }
        th, td {
            border: 2px solid black;
            padding: 10px;
            text-align: center;
            font-weight:normal;
        }
        th {
            background: black;
            color: white;
            font-weight:bold;
        }

        .quiz form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size:20px;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0px;
            margin-bottom:10px;
        }
        .form-row label {
            font-size: 1em;
            text-align: left;
            margin-right: 10px;
        }
        .form-row select {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            background: #3b3b4f;
            color: #fff;
            cursor: pointer;
        }
        .quiz button {
            padding: 10px 20px;
            font-size: 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background:rgb(231, 231, 231);
            color: #fff;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            float:right;
            color:black;
            font-weight:bold;
            font-family: 'Kollektif', sans-serif;
        }
        .quiz button:hover {
            background:rgb(255, 255, 255);;
            
        }

        @media (max-width: 768px) {
        .title-container{
            width:100%;
        }
        .quiz {
            padding:40px;
        }
        .join-quiz {
            padding:0px;
            flex-direction: column;
            align-items: center;
            font-size:18px;
        }

        .quiz-leaderboard-container {
            display: row; /* Aligns quiz and leaderboard side by side */
            gap: 20px; /* Space between them */
            align-items: center; /* Align to top */
        }

        .quiz, .leaderboard {
            width: 100%;
            max-width: 500px;
        }
}

    </style>
</head>
<body>
    <?php

    // Fetch distinct anime titles
    $animeQuery = "SELECT DISTINCT a.animeTitle, a.AnimeID FROM anime a INNER JOIN quiz q ON a.AnimeID = q.AnimeID ORDER BY a.animeTitle";
    $animeResult = mysqli_query($condb, $animeQuery);

    // Fetch distinct difficulty levels
    $difficultyQuery = "SELECT DISTINCT Difficulty FROM quiz ORDER BY FIELD(Difficulty, 'Easy', 'Normal', 'Hard')";
    $difficultyResult = mysqli_query($condb, $difficultyQuery);
    ?>

    
    <div class='join-quiz'>
    <div class='title-container'>
        <h1>JOIN QUIZ</h1>
        <hr>
    </div>
        <div class="quiz-leaderboard-container">
            <div class='quiz'>
                <form method="POST" action="start-quiz.php">
                    <div class="form-row">
                        <label for="animeSelect">Anime:</label>
                        <select id="animeSelect" name="animeID" required>
                            <option value="">-- Select Anime --</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($animeResult)) {
                                echo '<option value="' . htmlspecialchars($row['AnimeID']) . '">'
                                    . htmlspecialchars($row['animeTitle']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="difficultySelect">Difficulty:</label>
                        <select id="difficultySelect" name="difficulty" required>
                            <option value="">-- Select Difficulty --</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($difficultyResult)) {
                                echo '<option value="' . htmlspecialchars($row['Difficulty']) . '">'
                                    . htmlspecialchars($row['Difficulty']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    
                    <button type="submit">Start Quiz</button>
                </form>
            </div>
        
            <!-- Leaderboard Section -->
            <div class="leaderboard">
                <h2 style="font-size:30px; margin-bottom:10px;margin-top:0px;">LEADERBOARD</h2><hr style="border:2px solid black;margin-bottom:30px;">
    
                <!-- Filter Form -->
                <form method="GET" action="">
                    <div class="form-row">
                        <label for="leaderboardAnime">Anime:</label>
                        <select id="leaderboardAnime" name="leaderboardAnime" onchange="this.form.submit()">
                            <option value="">-- Select Anime --</option>
                            <?php
                            // Populate Anime Dropdown
                            $animeResult = mysqli_query($condb, $animeQuery);
                            while ($row = mysqli_fetch_assoc($animeResult)) {
                                $selected = (isset($_GET['leaderboardAnime']) && $_GET['leaderboardAnime'] == $row['AnimeID']) ? "selected" : "";
                                echo '<option value="' . htmlspecialchars($row['AnimeID']) . '" ' . $selected . '>'
                                    . htmlspecialchars($row['animeTitle']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="leaderboardDifficulty">Difficulty:</label>
                        <select id="leaderboardDifficulty" name="leaderboardDifficulty" onchange="this.form.submit()">
                            <option value="">-- Select Difficulty --</option>
                            <?php
                            // Populate Difficulty Dropdown
                            $difficultyResult = mysqli_query($condb, $difficultyQuery);
                            while ($row = mysqli_fetch_assoc($difficultyResult)) {
                                $selected = (isset($_GET['leaderboardDifficulty']) && $_GET['leaderboardDifficulty'] == $row['Difficulty']) ? "selected" : "";
                                echo '<option value="' . htmlspecialchars($row['Difficulty']) . '" ' . $selected . '>'
                                    . htmlspecialchars($row['Difficulty']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </form><br>

                <table>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Time (HH:MM:SS)</th>
                    </tr>
                    <?php
                    // Fetch leaderboard data with filters
                    $selectedAnime = isset($_GET['leaderboardAnime']) ? mysqli_real_escape_string($condb, $_GET['leaderboardAnime']) : "";
                    $selectedDifficulty = isset($_GET['leaderboardDifficulty']) ? mysqli_real_escape_string($condb, $_GET['leaderboardDifficulty']) : "";

                    $leaderboardQuery = "SELECT users.Username, result.Score, result.TimeTaken 
                                        FROM result
                                        INNER JOIN users ON result.NoIC = users.NoIC
                                        INNER JOIN quiz ON result.QuizID = quiz.QuizID
                                        INNER JOIN anime ON quiz.AnimeID = anime.AnimeID
                                        WHERE 1=1"; // Always true to allow appending conditions dynamically

                    if (!empty($selectedAnime)) {
                        $leaderboardQuery .= " AND anime.AnimeID = '$selectedAnime'";
                    }
                    if (!empty($selectedDifficulty)) {
                        $leaderboardQuery .= " AND quiz.Difficulty = '$selectedDifficulty'";
                    }

                    $leaderboardQuery .= " ORDER BY result.Score DESC, result.TimeTaken ASC LIMIT 10";

                    $leaderboardResult = mysqli_query($condb, $leaderboardQuery);

                    if (mysqli_num_rows($leaderboardResult) > 0) {
                        $rank = 1;
                        while ($row = mysqli_fetch_assoc($leaderboardResult)) {
                            echo "<tr>
                                    <td>{$rank}</td>
                                    <td>{$row['Username']}</td>
                                    <td>{$row['Score']}</td>
                                    <td>{$row['TimeTaken']}</td>
                                </tr>";
                            $rank++;
                        }
                    } else {
                        echo "<tr><td colspan='4'>No scores yet</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php
    // Close the connection
    mysqli_close($condb);
    ?>
</body>
</html>




<?php include('footer.php')?>
