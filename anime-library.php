<?php

session_start();
include ('connection.php');
include ('header.php');

$anime_list = "SELECT*FROM anime";


// Include database connection
include('connection.php');

// Fetch anime data
$query = "SELECT a.AnimeID, a.AnimeTitle, a.Author, a.PublishedYear,a.ImagePath, c.Genre
FROM Anime a
JOIN Category c ON a.CategoryID = c.CategoryID";

$result = $condb->query($query);

if (!$result) {
    die("Query failed: " . $condb->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime List</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .anime-container {
            width: 1400px;
            margin: 0px auto;
            padding: 10px;
            text-align: left; /* Aligns all text content to the left */
            font-size:25px;
        }

        .title-container {
            margin-top:10px;
            margin-bottom:10px;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center-align items vertically */
            gap: 10px; /* Add spacing between the h1 and the hr */
        }

        .title-container h1 {
            font-size: 40px; /* Adjust font size */
            margin: 0; /* Remove default margin */
            white-space: nowrap; /* Prevent text wrapping */
        }

        .title-container hr {
            flex-grow: 1; /* Allow the hr to fill the remaining space */
            height: 4px; /* Set the height of the line */
            background: black; /* Set the line color */
            border: none; /* Remove default border */
        }

        .anime-grid {
            display: flex; /* Use flexbox for row-based layout */
            flex-direction: column; /* Stack items vertically */
            gap: 20px; /* Add spacing between rows */
        }

        .anime-card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex; /* Flexbox for aligning content horizontally */
            gap: 20px;
            padding: 10px;
            align-items: center; /* Center-align content vertically */
            border-radius:5px;
        }

        .anime-card img {
            width: 550px; /* Set a fixed width for the image */
            height: 330px; /* Set a fixed height for the image */
            object-fit: fill; /* Keep the image proportionate */
            border-radius: 5px;
        }

        .anime-card .anime-info {
            flex: 1; /* Allow text to expand and fill the remaining space */
        }

        .anime-card .anime-info h3 {
            font-size: 40px;
            margin: 0 0 10px;
            color: #333;
        }

        .anime-card .anime-info p {
            margin: 5px 0;
            color: #555;
            text-align: left; /* Aligns description text to the left */
            font-size:25px;
            line-height:40px;
        }

        .anime-card .actions {
            margin-top: 10px;
            align-items: center;
	        justify-content: center;
            display:flex;
            flex-direction: column; /* Stack buttons vertically */
            gap: 10px;
            margin-right:10px;
        }


        .anime-card .actions a {
            text-decoration: none;
            text-align:center;
            color: white;
            padding: 20px 20px;
            border-radius: 5px;
            background-color:rgb(49, 49, 49);
            transition: background-color 0.3s ease;
            width:180px;
            font-size:18px;
        }

        .anime-card .actions a:hover {
            background-color:rgb(0, 0, 0);
        }

        @media (max-width: 768px) {
            .anime-container {
                width:560px;
                margin: 0 auto;
                padding: 15px;
                text-align: left;
            }

            .title-container {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .title-container h1 {
                font-size: 28px;
                margin: 0;
                white-space: nowrap;
            }

            .title-container hr {
                flex-grow: 1;
                height: 3px;
                background: black;
                border: none;
            }

            .anime-grid {
                display: flex;
                flex-direction: column;
                gap: 5px;
            }

            .anime-card {
                background-color: white;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 10px;
                border-radius: 5px;
            }

            .anime-card img {
                width: 100%;
                max-width: 400px;
                height: auto;
                border-radius: 5px;
            }

            .anime-card .anime-info {
                text-align: center;
                padding: 10px;
                
            }

            .anime-card .anime-info h3 {
                font-size: 22px;
                margin: 5px 0;
            }

            .anime-card .anime-info p {
                margin: 5px 0;
                font-size: 16px;
                color: #555;
                line-height:20px;
            }

            .anime-card .actions {
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            .anime-card .actions a {
                display: block;
                text-decoration: none;
                text-align: center;
                color: white;
                padding: 12px;
                border-radius: 5px;
                background-color: rgb(49, 49, 49);
                transition: background-color 0.3s ease;
                font-size: 16px;
            }

            .anime-card .actions a:hover {
                background-color: rgb(0, 0, 0);
            }
        }
    </style>
</head>
<body>

<div class="anime-container">
    <div class="title-container">
        <h1>ANIME LIBRARY</h1>
        <hr>
    </div>
    <div class="anime-grid">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="anime-card">
        <img src="<?php echo htmlspecialchars($row['ImagePath']); ?>" alt="<?php echo htmlspecialchars($row['AnimeTitle']); ?>">
            <div class="anime-info">
                <h3><?php echo htmlspecialchars($row['AnimeTitle']); ?></h3><br>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($row['Author']); ?></p>
                <p><strong>Year:</strong> <?php echo htmlspecialchars($row['PublishedYear']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($row['Genre']); ?></p>
            </div>
            <div class="actions">
                <a href="description.php?id=<?php echo htmlspecialchars($row['AnimeID']); ?>">Description</a>
                <a href="join-quiz.php?id=<?php echo htmlspecialchars($row['AnimeID']); ?>" 
                    class="attempt-quiz" 
                    data-id="<?php echo htmlspecialchars($row['AnimeID']); ?>">
                    Attempt Quiz
                </a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
<script>
    document.querySelectorAll('.attempt-quiz').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); 
        let animeID = this.getAttribute('data-id'); 
        
        fetch(`check-questions.php?id=${animeID}`)
        .then(response => response.json())
        .then(data => {
            if (data.hasQuestions) {
                window.location.href = `join-quiz.php?id=${animeID}`;
            } else {
                alert("The quiz is still being drafted, To be continue.....");
            }
        })
        .catch(error => {
            console.error("Error fetching quiz data:", error);
            alert("An error occurred. Please try again.");
        });
    });
});

</script>

</html>

<?php include('footer.php') ?>






