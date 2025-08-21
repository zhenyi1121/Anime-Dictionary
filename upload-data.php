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
    <title>Upload CSV Files</title>
    <style>
        .container {
            width: 50%;
            background-color: black;
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            margin:20px auto;
        }

        .title-container {
            max-width:100%;
            padding:15px 20px; 
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

        .container h3, label{
            font-size:25px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        select, input[type="file"], button {
            width: 80%;
            padding: 10px;
            font-size: 20px;
            border-radius: 5px;
            font-family: 'Kollektif', sans-serif;
        }

        select {
            border: 1px solid white;
            background-color: white;
            color: black;
        }

        input[type="file"] {
            background-color: white;
            border: none;
            max-width:77.5%;
            color:black;
        }

        button {
            background-color: lightgrey;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-family: 'Kollektif', sans-serif;
            font-weight:bold;
        }

        button:hover {
            background-color: grey;
            color: white;
        }

        @media (max-width: 768px) {
            input[type="file"] {
                max-width:74.5%;
            }
        }
    </style>
</head>
<body>

<div class="title-container">
    <hr><h1>UPLOAD DATA</h1><hr>
</div>
<div class="container">
    

    <form action="upload-data-proses.php" method="post" enctype="multipart/form-data">
        <h3>Select Table and Upload CSV</h3>
        <label for="table">Choose Table:</label>
        <select name="table" required>
            <option value="admin">Admin</option>
            <option value="users">Users</option>
            <option value="anime">Anime</option>
            <option value="quiz">Quiz</option>
            <option value="questions">Questions</option>
        </select>
        <input type="file" name="csv_file" accept=".csv" required>
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>

<?php include('footer.php'); ?>
