<?php
include('connection.php');

if (isset($_GET['id'])) {
    $animeID = $_GET['id'];
    $query = "SELECT ImagePath FROM Anime WHERE AnimeID = ?";
    $stmt = $condb->prepare($query);
    $stmt->bind_param("s", $animeID);
    $stmt->execute();
    $stmt->bind_result($imageData);
    $stmt->fetch();
    $stmt->close();

    header("Content-Type: image/png"); // Adjust MIME type if needed
    echo $imageData;
}
?>