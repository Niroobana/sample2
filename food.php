<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE Food";
if ($conn->query($sql) === TRUE) {
    echo "Database Food created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

$conn->select_db("Food");

// Create table
$sql = "CREATE TABLE Reserve (
Res_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Foodtype VARCHAR(30) NOT NULL,
FullName VARCHAR(30) NOT NULL,
TokenNumber VARCHAR(10) NOT NULL,
FoodSize VARCHAR(10) NOT NULL,
IsApproved BOOLEAN NOT NULL,
Timestamp DATE NOT NULL,
TotalCost DECIMAL(10,2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Reserve created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert records
$records = [
    ["Fruits", "Nick Conners", "123123A", "Medium", false, "2022-12-12", 5450.00],
    ["Vegetables", "John Bradley", "123124A", "Large", true, "2022-12-13", 2200.00],
    ["Fruits", "Soap MacTavish", "223124A", "Medium", true, "2022-12-23", 1150.00],
    ["Dairy", "John Bradley", "225124A", "Large", false, "2022-12-24", 4400.00],
    ["Grains", "Nick Johan", "228124A", "Medium", true, "2022-12-21", 3450.00]
];

foreach ($records as $record) {
    $sql = "INSERT INTO Reserve (Foodtype, FullName, TokenNumber, FoodSize, IsApproved, Timestamp, TotalCost)
            VALUES ('{$record[0]}', '{$record[1]}', '{$record[2]}', '{$record[3]}', {$record[4]}, '{$record[5]}', {$record[6]})";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Display records
$sql = "SELECT * FROM Reserve";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Reserve information<br>";
    while($row = $result->fetch_assoc()) {
        echo "Res_ID: " . $row["Res_ID"]. " - Foodtype: " . $row["Foodtype"]. " - FullName: " . $row["FullName"]. " - TokenNumber: " . $row["TokenNumber"]. " - FoodSize: " . $row["FoodSize"]. " - IsApproved: " . $row["IsApproved"]. " - Timestamp: " . $row["Timestamp"]. " - TotalCost: " . $row["TotalCost"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>