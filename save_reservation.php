<?php
// Get form data
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
$date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
$time = trim(filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING));
$guests = trim(filter_input(INPUT_POST, 'guests', FILTER_SANITIZE_NUMBER_INT));
$comments = trim(filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING));

// Validate form data
if (empty($name)) {
    $errors[] = "Name is required.";
}
if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}
if (empty($phone)) {
    $errors[] = "Phone number is required.";
}
if (empty($date)) {
    $errors[] = "Date is required.";
}
if (empty($time)) {
    $errors[] = "Time is required.";
}
if (empty($guests)) {
    $errors[] = "Number of guests is required.";
} elseif ($guests < 1) {
    $errors[] = "Number of guests must be at least 1.";
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GoodFood";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// If no errors, process the form
if (empty($errors)) {
    // Insert data into table
    $sql = "INSERT INTO Reservations (name, email, phone, date, time, guests, comments)
            VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Display errors
    echo "<b>Error:</b>";
    echo "<br>" . implode("<br>", $errors);
}
?>