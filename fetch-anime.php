<?php
include('connection.php');

if (isset($_GET['categoryID'])) {
    $categoryID = mysqli_real_escape_string($condb, $_GET['categoryID']);

    // Fetch anime details and check for quiz availability
    $query = "SELECT a.AnimeID, a.AnimeTitle, a.Author, a.PublishedYear, a.ImagePath, c.Genre,
                     (SELECT COUNT(*) FROM Quiz q WHERE q.AnimeID = a.AnimeID) AS QuizCount
              FROM Anime a
              JOIN Category c ON a.CategoryID = c.CategoryID
              WHERE a.CategoryID = '$categoryID' 
              ORDER BY a.AnimeTitle";

    $result = mysqli_query($condb, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='anime-grid'>";
        while ($row = mysqli_fetch_assoc($result)) {
            $hasQuiz = $row['QuizCount'] > 0;
            
            echo "<div class='anime-card'>
                    <img src='" . htmlspecialchars($row['ImagePath']) . "' alt='" . htmlspecialchars($row['AnimeTitle']) . "'>
                    <div class='anime-info'>
                        <h3>" . htmlspecialchars($row['AnimeTitle']) . "</h3><br>
                        <p><strong>Author:</strong> " . htmlspecialchars($row['Author']) . "</p>
                        <p><strong>Year:</strong> " . htmlspecialchars($row['PublishedYear']) . "</p>
                        <p><strong>Genre:</strong> " . htmlspecialchars($row['Genre']) . "</p>
                    </div>
                    <div class='actions'>
                        <a href='description.php?id=" . htmlspecialchars($row['AnimeID']) . "'>Description</a>";
            
            // Only show "Attempt Quiz" button if a quiz exists
            if ($hasQuiz) {
                echo "<a href='join-quiz.php?id=" . htmlspecialchars($row['AnimeID']) . "'>Attempt Quiz</a>";
            } else {
                echo "<a disabled style='background-color: gray; cursor: not-allowed;'>Quiz Unavailable</a>";
            }

            echo "</div>
                  </div>";
        }
        echo "</div>";
    } else {
        echo "<p>No anime found in this category.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
