<?php
// Database connection
$servername = "localhost";
$username = "root";
$password "";
$dbname = "health tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle saving water intake details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST['quantity'];
    $frequency = $_POST['frequency'];

    // Calculate total water intake
    $totalIntake = $quantity * $frequency;

    // Perform database insertion
    $sql = "INSERT INTO water_intake (quantity, frequency) VALUES ('$quantity', '$frequency')";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Water intake details saved successfully";
        $response['totalIntake'] = $totalIntake;
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
