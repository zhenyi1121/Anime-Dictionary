<?php
session_start();
include('connection.php');
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 1400px;
            margin: auto;
            padding: 0px;
            margin-top:20px;
        }

        .title-container {
            margin-top:0px;
            margin-bottom:20px;
            display: flex; /* Use flexbox for horizontal alignment */
            align-items: center; /* Center-align items vertically */
            gap: 10px; /* Add spacing between the h1 and the hr */
        }

        .title-container h1 {
            font-size: 40px; /* Adjust font size */
            margin: 0; /* Remove default margin */
            white-space: nowrap; /* Prevent text wrapping */
            text-align: center;
        }

        .title-container hr {
            flex-grow: 1; /* Allow the hr to fill the remaining space */
            height: 4px; /* Set the height of the line */
            background: black; /* Set the line color */
            border: none; /* Remove default border */
        }

        
        .genres {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center; /* Align items to the left */
            align-items: flex-start;
            margin-top: 30px;
        }

        .genre-block {
            width: 160px;
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .genre-block:hover {
            transform: scale(1.1);
            opacity:0.7;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .anime-list {
            width: 1400px;
            margin: 0px auto;
            margin-top:20px;
            padding: 10px;
            text-align: left; /* Aligns all text content to the left */
            font-size:25px;
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
            .container {
                width:550px;
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

            .anime-list {
                width: 550px;
                margin: 0px auto;
                margin-top:20px;
                padding: 10px;
                text-align: left; /* Aligns all text content to the left */
                font-size:25px;
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
    </style>
</head>
<body>



<div class='container'>
    <div class="title-container">
        <hr><h1>ANIME CATEGORY</h1><hr>
    </div>
    <div class="genres">
        <?php
        // Fetch genres
        $genreQuery = "SELECT * FROM category ORDER BY Genre";
        $genreResult = mysqli_query($condb, $genreQuery);

        while ($row = mysqli_fetch_assoc($genreResult)) {
            $genre = htmlspecialchars($row['Genre']);
            $categoryID = htmlspecialchars($row['CategoryID']);
            $genrePic = htmlspecialchars($row['Genre_Pic']);

            echo '<div class="genre-block" style="background-image: url(\'' . $genrePic . '\');" data-category-id="' . $categoryID . '">';
            echo '<span>' . $genre . '</span>';
            echo '</div>';
        }
        ?>
    </div>


</div>

<div class="anime-list" id="animeList"></div>


<script>
    function fetchAnime(categoryID) {
        fetch("fetch-anime.php?categoryID=" + categoryID)
        .then(response => response.text())
        .then(data => {
            document.getElementById("animeList").innerHTML = data;
        });
    }

    // Attach click event to all genre blocks
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".genre-block").forEach(block => {
            block.addEventListener("click", function () {
                const categoryID = this.getAttribute("data-category-id");
                fetchAnime(categoryID);
            });
        });
    });

  
    

</script>



</body>

    
<?php include('footer.php')?>