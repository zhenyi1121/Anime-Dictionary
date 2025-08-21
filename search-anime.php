<?php
session_start();
include('connection.php');
include('header.php');

// Get search query
$search_query = isset($_GET['query']) ? trim($_GET['query']) : "";

$results = [];
if (!empty($search_query)) {
    // Prepare SQL query (searching by title or genre)
    $stmt = $condb->prepare("
        SELECT a.AnimeID, a.AnimeTitle, a.Author, a.PublishedYear, a.ImagePath, c.Genre
        FROM Anime a
        JOIN Category c ON a.CategoryID = c.CategoryID
        WHERE a.AnimeTitle LIKE ? OR c.Genre LIKE ?
    ");

    // Create the search pattern
    $like_query = "%" . $search_query . "%";

    // Bind parameters
    $stmt->bind_param("ss", $like_query, $like_query);

    // Execute the query
    if ($stmt->execute()) {
        // Fetch results
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$condb->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container{
            width: 93%;
            margin: 0px auto;
            padding: 10px;
            text-align: left; /* Aligns all text content to the left */
            font-size:25px;
        }

        .title-container {
            width:93%;
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
    <div class="title-container">
        <h1>SEARCH RESULTS</h1>
        <hr>
    </div>
    <div class="container">
        <?php if (!empty($results)): ?>
            <ul style="list-style-type: none; padding: 0;">
                <?php foreach ($results as $anime): ?>
                    <li class="anime-card">
                        <img src="<?php echo htmlspecialchars($anime['ImagePath']); ?>" alt="<?php echo htmlspecialchars($anime['AnimeTitle']); ?>">
                        <div class="anime-info">
                            <h3><?php echo htmlspecialchars($anime['AnimeTitle']); ?></h3><br>
                            <p><strong>Author:</strong> <?php echo htmlspecialchars($anime['Author']); ?></p>
                            <p><strong>Year:</strong> <?php echo htmlspecialchars($anime['PublishedYear']); ?></p>
                            <p><strong>Genre:</strong> <?php echo htmlspecialchars($anime['Genre']); ?></p>
                        </div>
                        <div class="actions">
                            <a href="description.php?id=<?php echo htmlspecialchars($anime['AnimeID']); ?>">Description</a>
                            <a href="attempt-quiz.php?id=<?php echo htmlspecialchars($anime['AnimeID']); ?>">Attempt Quiz</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($search_query): ?>
            <p>No results found for "<strong><?php echo htmlspecialchars($search_query); ?></strong>".</p>
        <?php else: ?>
            <p>Please enter a search query.</p>
        <?php endif; ?>

        <a href="index.php" style="display: inline-block; text-decoration:none; float:right; margin-top: 20px; background-color: rgb(0, 0, 0); color: #fff; padding: 10px 20px; border-radius: 5px;">Back to Home</a>
    </div>
</body>
</html>

<?php include('footer.php');?>

