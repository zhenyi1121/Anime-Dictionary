<?php
include('connection.php'); 
header('Content-Type: application/json');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$animeID = $condb->real_escape_string($_GET['id']);

// Check if the anime has quiz questions
$query = "SELECT COUNT(*) AS total FROM quiz WHERE AnimeID = ?";
$stmt = $condb->prepare($query);
$stmt->bind_param("s", $animeID);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();

echo json_encode(['hasQuestions' => $result['total'] > 0]);
?>
