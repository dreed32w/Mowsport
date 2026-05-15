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


$get = $conn->prepare("SELECT city_name, terrain_name FROM terrains WHERE id = ?");
$get->bind_param("i", $id);
$get->execute();
$result = $get->get_result();

if ($result->num_rows === 0) {
    die("not_found");
}

$row = $result->fetch_assoc();

$city = strtolower($row['city_name']);
$name = $row['terrain_name'];


$clean_name = preg_replace("/[^a-zA-Z0-9_-]/", "_", $name);


$folder = "terrains/" . $city . "/" . $clean_name . "/";


function deleteFolder($folderPath) {
    if (!is_dir($folderPath)) return;

    $files = array_diff(scandir($folderPath), ['.', '..']);

    foreach ($files as $file) {
        $path = $folderPath . $file;

        if (is_dir($path)) {
            deleteFolder($path);
        } else {
            unlink($path);
        }
    }

    rmdir($folderPath);
}


deleteFolder($folder);


$sql = "DELETE FROM terrains WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "tam";
} else {
    echo "error";
}

?>
