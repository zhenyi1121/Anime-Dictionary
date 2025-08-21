<?php
session_start();
include('connection.php'); // Database connection
include('header.php'); // Include header

// Check if AnimeID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid Anime ID.");
}

$anime_id = $_GET['id'];

// Fetch anime details from the database
$query = "SELECT AnimeTitle, Description, ImagePath, 
                 Main_Character1, Main_Character2, Main_Character3, Main_Character4, Main_Character5 
          FROM anime 
          WHERE AnimeID = ?";
$stmt = $condb->prepare($query);
$stmt->bind_param("s", $anime_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Anime not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['AnimeTitle']); ?> - Description</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            font-family: 'Kollektif', sans-serif;
            max-width: 1400px;
            margin: 20px auto;
            background-color: white;
            padding: 0px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        
        h1 {
            font-size: 40px;
        }

        .container hr{
            height:2px;
            background-color:black;
        }

        .anime-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 10px;
            margin: 0px 0;
        }
        .description {
            font-size: 18px;
            line-height: 1.6;
            text-align: justify;
            font-weight:normal;
        }
        .characters h2 {
            display: block;
            font-size: 1.5em;
            font-weight: bold;
            unicode-bidi: isolate;
        }
        .characters {
            margin-bottom: -10px;
            font-size: 25px;
            text-align: left;
            display: flex;
            flex-direction: column; /* Stack text and button */
            align-items: flex-start; /* Align text left */
        }
        .characters h2 {
            display: block;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom:-10px;
        }
        .characters ul {
            list-style-type: square;
            line-height:35px;
        }
        .back-btn {
            font-size:20px;
            display: inline-block;
            margin-bottom: 20px;
            margin-right: -5px;
            padding: 15px 15px;
            background-color:rgb(49, 49, 49);
            color: white;
            text-decoration: none;  
            border-radius: 5px;  
            font-size: 16px;
            margin-top: 0px; /* Adds spacing below the last character */
            align-self: flex-end; /* Aligns button with text */
            float:right;
        }
        .back-btn:hover {
            background-color: black;
        }

        @media (max-width: 768px) {
            .container {
                font-family: 'Kollektif', sans-serif;
                max-width: 700px;
                margin: 20px auto;
                background-color: white;
                padding: 10px 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: left;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo htmlspecialchars($row['AnimeTitle']); ?></h1>
    <img src="<?php echo htmlspecialchars($row['ImagePath']); ?>" alt="<?php echo htmlspecialchars($row['AnimeTitle']); ?>" class="anime-image">
    
    <p class="description"><?php echo nl2br(htmlspecialchars($row['Description'])); ?></p>
    <hr>

    <div class="characters">
        <h2>Main Characters:</h2>
        <ul>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <?php if (!empty($row["Main_Character$i"])): ?>
                    <li><?php echo htmlspecialchars($row["Main_Character$i"]); ?></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    </div>
    <a href="anime-library.php" class="back-btn">Back to Anime Library</a>

    
</div>

</body>
</html>

<?php
$stmt->close();
$condb->close();
include('footer.php'); // Include footer
?>
