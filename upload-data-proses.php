<?php
include ('connection.php');

// Check if form is submitted
if (isset($_FILES["csv_file"]) && $_FILES["csv_file"]["error"] == 0 && isset($_POST["table"])) {
    $table = $_POST["table"];
    $file_tmp = $_FILES["csv_file"]["tmp_name"];

    if (($handle = fopen($file_tmp, "r")) !== FALSE) {
        fgetcsv($handle); // Skip header row

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($table == "admin") {
                $stmt = $condb->prepare("INSERT INTO admin (AdminID, Name, Password, Admin_email, Avatar) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", ...$data);
            } elseif ($table == "users") {
                $stmt = $condb->prepare("INSERT INTO users (NoIC, Username, Password, NoTelephone, Email, Avatar) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", ...$data);
            } elseif ($table == "anime") {
                $stmt = $condb->prepare("INSERT INTO anime (AnimeID, AnimeTitle, Author, PublishedYear, Description, Main_Character1, Main_Character2, Main_Character3, Main_Character4, Main_Character5, ImagePath, CategoryID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssssss", ...$data);
            } elseif ($table == "quiz") {
                $stmt = $condb->prepare("INSERT INTO quiz (QuizID, Difficulty, AnimeID) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", ...$data);
            } elseif ($table == "questions") {
                $stmt = $condb->prepare("INSERT INTO questions (Question, correctAnswer, choice1, choice2, choice3, choice4, QuizID) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", ...$data);
            } else {
                echo "Invalid table selected.";
                fclose($handle);
                exit;
            }

            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        fclose($handle);
        echo ucfirst($table) . "<script>alert('Data Upload Sucessfully');
                                window.location.href='upload-data.php';</script>";
    } else {
        echo "<script>alert('Error Opening File.');
            window.location.href='upload-data.php';</script>";
    }
} else {
    echo "<script>alert('No file update request.');
        window.location.href='upload-data.php';</script>";
}

$condb->close();
?>
