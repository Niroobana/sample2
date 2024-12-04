<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection OOP
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE GoodFood"; //query
if ($conn->query($sql) === FALSE) {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db("GoodFood");

// Create table
$sql = "CREATE TABLE Reservations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
phone VARCHAR(15),
date DATE,
time TIME,
guests INT(6),
comments TEXT
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Insert records
$sql = "INSERT INTO Reservations (name, email, phone, date, time, guests, comments)
VALUES ('John Doe', 'johndoe@example.com', '555-123-4567', '2022-12-01', '18:30:00', 4, 'Please provide us with a window seat.')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Reservations (name, email, phone, date, time, guests, comments)
VALUES ('Jane Smith', 'janesmith@example.com', '555-987-6543', '2022-12-03', '20:00:00', 2, 'No pork products please.')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>