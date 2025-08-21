<?php
session_start();
include('connection.php');
include('header.php');

if (!isset($_POST['animeID'])) {
    echo "<script>alert('No anime selected!'); window.location.href='edit-anime.php';</script>";
    exit();
}

$animeID = mysqli_real_escape_string($condb, $_POST['animeID']);

// Fetch anime details
$query = "SELECT * FROM Anime WHERE AnimeID = '$animeID'";
$result = mysqli_query($condb, $query);
$anime = mysqli_fetch_assoc($result);

if (!$anime) {
    echo "<script>alert('Anime not found!'); window.location.href='edit-anime.php';</script>";
    exit();
}

// Fetch all genres for dropdown
$genreQuery = "SELECT * FROM Category ORDER BY Genre";
$genreResult = mysqli_query($condb, $genreQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $title = mysqli_real_escape_string($condb, $_POST['title']);
    $author = mysqli_real_escape_string($condb, $_POST['author']);
    $year = mysqli_real_escape_string($condb, $_POST['year']);
    $Description = mysqli_real_escape_string($condb, $_POST['Description']);
    $Main_Character1 = mysqli_real_escape_string($condb, $_POST['Main_Character1']);
    $Main_Character2 = mysqli_real_escape_string($condb, $_POST['Main_Character2']);
    $Main_Character3 = mysqli_real_escape_string($condb, $_POST['Main_Character3']);
    $Main_Character4 = mysqli_real_escape_string($condb, $_POST['Main_Character4']);
    $Main_Character5 = mysqli_real_escape_string($condb, $_POST['Main_Character5']);
    $ImagePath = mysqli_real_escape_string($condb, $_POST['ImagePath']);
    $categoryID = mysqli_real_escape_string($condb, $_POST['category']);

    $updateQuery = "UPDATE Anime 
                    SET AnimeTitle='$title', 
                    Author='$author', 
                    PublishedYear='$year', 
                    Description = '$Description',
                    Main_Character1 = '$Main_Character1',
                    Main_Character2 = '$Main_Character2',
                    Main_Character3 = '$Main_Character3',
                    Main_Character4 = '$Main_Character4',
                    Main_Character5 = '$Main_Character5',
                    ImagePath = '$ImagePath',CategoryID='$categoryID'
                    WHERE AnimeID='$animeID'";

    if (mysqli_query($condb, $updateQuery)) {
        echo "<script>alert('Anime updated successfully!'); window.location.href='edit-anime.php';</script>";
    } else {
        echo "<script>alert('Error updating anime.'); window.location.href='edit-anime.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anime Details</title>
    <style>
       
        .container {
            width: 1000px;
            margin: 40px auto;
            background:rgb(255, 255, 255);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .title-container {
            width: 100%;
            padding: 0px;
            margin:0px auto;
            margin-bottom:40px;
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
        label {
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            border-radius: 5px;
            border: none;
        }
        input, select {
            background: #44445a;
            color: white;
        }

        input[type=text], input[type=number]{
            max-width:980px;
        }

        button {
            font-family: 'Kollektif', sans-serif;
            background:rgb(0, 0, 0);
            color: white;
            font-weight:bold;
            cursor: pointer;
            margin-top: 15px;
            padding:15px 15px;
            font-size:20px;
        }
        button:hover {
            opacity:80%;
        }
        .cancel-btn {
            font-family: 'Kollektif', sans-serif;
            background:rgb(181, 20, 20);
            color: white;
            font-weight:bold;
            padding:15px 15px;
            font-size:20px;
        }
        .cancel-btn:hover {
            background: #cc0000;
        }
        @media (max-width: 768px) {
            .container {
                width:80%;
            }
            input[type=text], input[type=number], textarea{
                max-width:95%;
            }

        }

    </style>
</head>
<body>

<div class="container">
    <div class="title-container">
        <h1>EDIT ANIME</h1><hr>
    </div>
    
    <form method="POST">
        <input type="hidden" name="animeID" value="<?= $animeID ?>">
        
        <label for="title">Anime Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($anime['AnimeTitle']) ?>" required>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?= htmlspecialchars($anime['Author']) ?>" required>

        <label for="year">Published Year:</label>
        <input type="number" name="year" id="year" value="<?= htmlspecialchars($anime['PublishedYear']) ?>" required>

        <label>Description:</label>
        <textarea name="Description" required><?= htmlspecialchars($anime['Description']) ?></textarea><br>

        <label>Main Character 1:</label>
        <input type="text" name="Main_Character1" value="<?= htmlspecialchars($anime['Main_Character1']) ?>" required><br>

        <label>Main Character 2:</label>
        <input type="text" name="Main_Character2" value="<?= htmlspecialchars($anime['Main_Character2']) ?>"><br>

        <label>Main Character 3:</label>
        <input type="text" name="Main_Character3" value="<?= htmlspecialchars($anime['Main_Character3']) ?>"><br>

        <label>Main Character 4:</label>
        <input type="text" name="Main_Character4" value="<?= htmlspecialchars($anime['Main_Character4']) ?>"><br>

        <label>Main Character 5:</label>
        <input type="text" name="Main_Character5" value="<?= htmlspecialchars($anime['Main_Character5']) ?>"><br>

        <label>Image Path:</label>
        <input type="text" name="ImagePath" value="<?= htmlspecialchars($anime['ImagePath']) ?>" required><br>

        <label for="category">Genre:</label>
        <select name="category" id="category" required>
            <?php while ($genre = mysqli_fetch_assoc($genreResult)) { ?>
                <option value="<?= $genre['CategoryID'] ?>" <?= ($anime['CategoryID'] == $genre['CategoryID']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($genre['Genre']) ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit" name="update">Update Anime</button>
        <button type="button" class="cancel-btn" onclick="window.location.href='edit-anime.php'">Cancel</button>
    </form>
</div>

</body>
</html>

<?php include('footer.php') ?>