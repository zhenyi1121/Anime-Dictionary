<?php
session_start();
include('connection.php');
include('header.php');

// Fetch all genres
$categoryQuery = "SELECT * FROM Category ORDER BY Genre";
$categoryResult = mysqli_query($condb, $categoryQuery);

// Get selected category
$selectedCategory = isset($_GET['category']) ? mysqli_real_escape_string($condb, $_GET['category']) : '';

// Fetch anime based on selected category
$query = "SELECT a.AnimeID, a.AnimeTitle, a.Author, a.PublishedYear, c.Genre
          FROM Anime a
          JOIN Category c ON a.CategoryID = c.CategoryID";

if (!empty($selectedCategory)) {
    $query .= " WHERE a.CategoryID = '$selectedCategory'";
}

$query .= " ORDER BY a.AnimeTitle";
$result = mysqli_query($condb, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anime</title>
    <style>
        
        .container {
            width: 1400px;
            padding: 0px 10px;
            margin: 0px auto;
            border-radius: 10px;
            font-size:20px;
        }

        .title-container {
            width: 1400px;
            padding: 10px;
            margin:0px auto;
            margin-bottom:0;
            position:sticky;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center-align items vertically */
            gap: 10px; /* Add spacing between the h1 and the hr */
        }

        .title-container h1 {
            font-size: 40px; /* Adjust font size */
            margin-top: 10px; /* Remove default margin */
            white-space: nowrap; /* Prevent text wrapping */
        }

        .title-container hr {
            flex-grow: 1; /* Allow the hr to fill the remaining space */
            height: 4px; /* Set the height of the line */
            background: black; /* Set the line color */
            border: none; /* Remove default border */
        }

        .container label{
            font-size:20px;
            font-weight:normal;
        }

        table {
            width: 100%;
            border-collapse: seperate;
            margin-top: 20px;
            border-radius:10px;
        }
        th, td {
            border: 2px solid rgb(0, 0, 0);
            padding: 10px;
            text-align: left;
            background-color:white;
            font-weight:normal;
            border-radius:10px;
        }
        th {
            background:rgb(0, 0, 0);
            color: white;
            font-weight:bold;
        }
        select, button {
            padding: 15px;
            margin: 10px 0;
        }
        button {
            float:right;
            background:rgb(0, 0, 0);
            color: white;
            font-size:20px;
            cursor: pointer;
            font-weight:bold;
            font-family: 'Kollektif', sans-serif;
            border-radius:5px;
            width: 30%;
        }
        button:hover {
            opacity:80%;
        }
        @media (max-width: 768px) {
            .title-container {
                width: 95%;
            }
            .container {
                width: 95%;
            }
            table {
                font-size: 14px;
                width: 100%;
            }
            select, button {
                width:200px;
            }
        }
    </style>
</head>
<body>
    <div class="title-container">
        <h1>EDIT ANIME</h1><hr>
    </div>
    <div class="container">      
        <form method="GET">
            <label for="category">Filter by Genre:</label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">All Genres</option>
                <?php while ($row = mysqli_fetch_assoc($categoryResult)) { ?>
                    <option value="<?= $row['CategoryID'] ?>" <?= ($selectedCategory == $row['CategoryID']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['Genre']) ?>
                    </option>
                <?php } ?>
            </select>
        </form>

        <form method="POST" action="edit-anime-details.php">
            <table>
                <tr>
                    <th>Select</th>
                    <th>Anime Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Genre</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><input type="radio" name="animeID" value="<?= $row['AnimeID'] ?>" required></td>
                        <td><?= htmlspecialchars($row['AnimeTitle']) ?></td>
                        <td><?= htmlspecialchars($row['Author']) ?></td>
                        <td><?= htmlspecialchars($row['PublishedYear']) ?></td>
                        <td><?= htmlspecialchars($row['Genre']) ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <button type="submit">Edit Selected Anime</button>
        </form>
        <form method="POST" action="cancel-anime.php" onsubmit="return confirmCancel();">
            <input type="hidden" id="cancelAnimeID" name="animeID">
            <button type="submit" class="cancel-btn" disabled id="cancelButton" style="margin-right:10px;">Cancel Selected Anime</button>
        </form>
        
    </div>

    <script>
        const radios = document.querySelectorAll('input[name="animeID"]');
        const cancelButton = document.getElementById("cancelButton");
        const cancelAnimeID = document.getElementById("cancelAnimeID");

        radios.forEach(radio => {
            radio.addEventListener("change", function () {
                cancelButton.disabled = false;
                cancelAnimeID.value = this.value;
            });
        });

        function confirmCancel() {
            return confirm("Are you sure you want to cancel this anime?");
        }
    </script>
</body>
</html>

<?php include('footer.php'); ?>
