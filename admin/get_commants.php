<?php

header("Content-Type: application/json");

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "mowsport"
);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$comments = [];

$sql = "SELECT * FROM commants";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

echo json_encode($comments);

?>