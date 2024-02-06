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

// Fetch dashboard data from database
$sql = "SELECT SUM(calories_burned) AS caloriesBurnt,
               SUM(calories_gained) AS caloriesGained,
               SEC_TO_TIME(SUM(TIME_TO_SEC(exercise_duration))) AS exerciseTime,
               SEC_TO_TIME(SUM(TIME_TO_SEC(sleep_duration))) AS sleepTime
        FROM your_table_name"; // Replace with your actual table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['caloriesBurnt'] = $row['caloriesBurnt'];
    $response['caloriesGained'] = $row['caloriesGained'];
    $response['exerciseTime'] = $row['exerciseTime'];
    $response['sleepTime'] = $row['sleepTime'];
} else {
    $response['error'] = "No data found";
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
