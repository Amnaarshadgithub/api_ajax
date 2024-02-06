<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle saving meal details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $time = $_POST['time'];
    $carbs = $_POST['carbs'];
    $protein = $_POST['protein'];
    $calories = $_POST['calories'];

    // Perform database insertion
    $sql = "INSERT INTO meal_details (time, carbs, protein, calories) VALUES ('$time', $carbs, $protein, $calories)";

    if ($conn->query($sql) === TRUE) {
        $response['message'] = "Meal details saved successfully";
    } else {
        $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

$conn->close();
?>
