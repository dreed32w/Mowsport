<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "mowsport"
);

if ($conn->connect_error) {
    die("db_error");
}

$id = intval($_POST['id']);

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "tam";
} else {
    echo "error";
}

?>