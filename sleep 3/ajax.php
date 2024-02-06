<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle saving sleep routine details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $duration = $_POST['duration'];

    // Perform database insertion
    $sql = "INSERT INTO sleep (start_time, end_time, duration) VALUES ('$startTime', '$endTime', '$duration')";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Sleep routine details saved successfully";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

$conn->close();
?>
