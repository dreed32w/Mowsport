<?php
session_start();
$conn = new mysqli(
    "localhost",
    "root",
    "",
    "mowsport"
);

if ($conn->connect_error) {
    die("error_db");
}



$first_name = trim($_SESSION['prenom']);
$last_name = trim($_SESSION['nom']);
$email = trim($_SESSION['email']);
$age = intval($_SESSION['age']);
$cin = trim($_SESSION['cin']);
$phone = trim($_SESSION['phone']);
$total = floatval($_POST['total']);
$city_id = intval($_SESSION['city']);

$date_op = trim($_SESSION['date_op']);
$temp_op = trim($_SESSION['temp_op']);

$terrain_name = trim($_SESSION['terrain_name']);
$nb_players = intval($_SESSION['nb_players']);


$dure = $_SESSION['dure'];



$sql = "
INSERT INTO users(first_name,last_name,email,phone,cin,age,city_id,date_op,temp_op,dure,terrain_name,nb_players, total)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("prepare_error");
}

$stmt->bind_param(
    "sssssiissisid",
    $first_name,
    $last_name,
    $email,
    $phone,
    $cin,
    $age,
    $city_id,
    $date_op,
    $temp_op,
    $dure,
    $terrain_name,
    $nb_players,
    $total
);


if ($stmt->execute()) {
    header("Location: pdf_sec.php");
    exit;
} else {
    $_SESSION['msg'] = "erreur";
    header("Location: index.php#toto");
    exit;
}

?>
