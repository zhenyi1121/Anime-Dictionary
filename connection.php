<?php

$servername = "localhost"; // Server name or IP address
$username = "root";        // Database username
$password = "";            // Database password (default is empty for localhost)
$database = "anime_dictionary";  // Database name

// Create connection
$condb = new mysqli($servername, $username, $password, $database);

// Check connection
if ($condb->connect_error) {
    die("Connection failed: " . $condb->connect_error);
}
else{
    #echo "Connection Succesfully.";
}
?>
