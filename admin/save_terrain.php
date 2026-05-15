<?php
session_start();
$conn = new mysqli(
    "localhost",
    "root",
    "",
    "mowsport"
);
if ($conn->connect_error) {
    $_SESSION['msg'] = "DB Error";
    header("Location: dashboard.php");
    exit;
}

$cityos = ["safi","casablanca","errachidia","rabat","marrakech","mohammedia","fes"];


$name = htmlspecialchars(trim($_POST['terrain_name']));
$city = htmlspecialchars(trim($_POST['city_name']));
$price = htmlspecialchars(intval($_POST['price']));
$desc = htmlspecialchars(trim($_POST['description']));
$big_desc = htmlspecialchars(trim($_POST['big-description']));

$city_lower = strtolower($city);


$clean_name = preg_replace("/[^a-zA-Z0-9_-]/", "_", $name);


$city_id = array_search($city_lower, $cityos);

if ($city_id === false) {
    die("Ville invalide");
}

$city_id += 1;


$main_folder = "../terrains/";
$city_folder = $main_folder . $city_lower . "/";

if (!file_exists($city_folder)) {
    mkdir($city_folder, 0777, true);
}


$check = $conn->prepare("SELECT id FROM terrains WHERE terrain_name = ? AND city_name = ?");

$check->bind_param("ss", $name, $city);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $_SESSION['msg'] = "le terrain est existe";
    header("Location: dashboard.php");
    exit;
}


$terrain_folder = $city_folder . $clean_name . "/";

if (!file_exists($terrain_folder)) {
    if (!mkdir($terrain_folder, 0777, true)) {
        die("Cannot create terrain folder");
    }
}


function save_image($file, $folder, $file_name)
{
    if (!isset($file) || $file['error'] != 0) {
        return null;
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    if (!$extension) {
        return null;
    }

    $final_name = $file_name . "." . $extension;
    $final_path = $folder . $final_name;

    if (!move_uploaded_file($file['tmp_name'], $final_path)) {
        return null;
    }

    return $final_name;
}


$image_cover = save_image($_FILES['image'], $terrain_folder, "cover");
$image_j1    = save_image($_FILES['image_j1'], $terrain_folder, "j1");
$image_j2    = save_image($_FILES['image_j2'], $terrain_folder, "j2");
$image_j3    = save_image($_FILES['image_j3'], $terrain_folder, "j3");

if (!$image_cover || !$image_j1 || !$image_j2 || !$image_j3) {
    $_SESSION['msg']  = "error d'uoload les emages";
    header("Location: dashboard.php");
    exit;
}


$db_path = "terrains/" . $city_lower . "/" . $clean_name . "/";

$img_cover_path = $db_path . $image_cover;
$img_j1_path    = $db_path . $image_j1;
$img_j2_path    = $db_path . $image_j2;
$img_j3_path    = $db_path . $image_j3;


$sql = "
INSERT INTO terrains(terrain_name,city_name,price_per_hour,description,big_description,image,image_J1,image_J2,image_J3,city_id)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssissssssi",$name,$city,$price,$desc,$big_desc,$img_cover_path,$img_j1_path,$img_j2_path,$img_j3_path,$city_id);


if ($stmt->execute()) {
    $_SESSION['msg'] = "Le stade a été ajouté";
} else {
    $_SESSION['msg'] = "Erreur SQL";
}

header("Location: dashboard.php");
exit;

?>
