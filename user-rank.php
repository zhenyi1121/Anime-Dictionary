<?php
session_start();
include('connection.php');
include('header.php');

// Fetch leaderboard data (total score ranking)
$leaderboardQuery = "
    SELECT users.Username, SUM(result.Score) AS TotalScore
    FROM result
    INNER JOIN users ON result.NoIC = users.NoIC
    GROUP BY users.NoIC, users.Username
    ORDER BY TotalScore DESC
    LIMIT 10"; // Top 10 players by total score

$leaderboardResult = mysqli_query($condb, $leaderboardQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Rank by Total Score</title>
    <style>
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

        .leaderboard {
            background: white;
            width: 1300px;
            padding:40px;
            margin:auto;
            border-radius:10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0px;
            font-size:20px;
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


        @media (max-width: 768px) {
            .title-container {
                width: 645px;
                padding:20px 0px;
            }

            .leaderboard {
                width: 80%;
                margin:auto;
                margin-bottom:40px;
            }
            

     }
    </style>
</head>
<body>
    <div class='title-container'>
        <h1>USER RANK (Total Score)</h1>
        <hr>
    </div>

    <div class="leaderboard">
        <table>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Total Score</th>
            </tr>
            <?php
            $leaderboardResult = mysqli_query($condb, $leaderboardQuery);

            if (mysqli_num_rows($leaderboardResult) > 0) {
                $rank = 1;
                while ($row = mysqli_fetch_assoc($leaderboardResult)) {
                    echo "<tr>
                                <td>{$rank}</td>
                                <td>{$row['Username']}</td>
                                <td>{$row['TotalScore']}</td>
                            </tr>";
                    $rank++;
                }
            } else {
                echo "<tr><td colspan='3'>No scores yet</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php include('footer.php') ?>