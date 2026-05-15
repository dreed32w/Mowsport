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
$users = [];

if (isset($_GET['email']) && !empty($_GET['email'])) {

    $email = trim($_GET['email']);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

} else {

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
}

while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);

?>