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

$terrains = [];


if (isset($_GET['terrain_name']) && !empty($_GET['terrain_name'])) {

    $terrain_name = trim($_GET['terrain_name']);

    $sql = "SELECT * FROM terrains WHERE terrain_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $terrain_name);
    $stmt->execute();

    $result = $stmt->get_result();
}


if (isset($_GET['city_id']) && !empty($_GET['city_id'])) {

    $city_id = (int)$_GET['city_id'];

    $sql = "SELECT * FROM terrains WHERE city_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $city_id);
    $stmt->execute();

    $result = $stmt->get_result();

} else {

    $sql = "SELECT * FROM terrains";
    $result = $conn->query($sql);
}

while ($row = $result->fetch_assoc()) {
    $terrains[] = $row;
}

echo json_encode($terrains);

?>
