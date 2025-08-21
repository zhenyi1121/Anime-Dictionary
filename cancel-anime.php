<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['animeID'])) {
    $animeID = mysqli_real_escape_string($condb, $_POST['animeID']);
    
    $deleteQuery = "DELETE FROM Anime WHERE AnimeID = '$animeID'";
    if (mysqli_query($condb, $deleteQuery)) {
        echo "<script>alert('Anime canceled successfully'); window.location.href='edit-anime.php';</script>";
    } else {
        echo "<script>alert('Error canceling anime'); window.location.href='edit-anime.php';</script>";
    }
}
?>
