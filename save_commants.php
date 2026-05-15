<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
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


$sql = "
INSERT INTO commants(nom,email,sujet,message)VALUES(?, ?, ?, ?)";
    $stm = $conn->prepare($sql);
    if (!$stm) {
        die("prepare_error");
    }
    $stm->bind_param("ssss", $_POST['nom'], $_POST['email'], $_POST['sujet'], $_POST['message']);
    if ($stm->execute()) {
        $_SESSION['msg'] = "merci pour votre message";
        header("Location: contact.php");
        exit;
    } else {
        $_SESSION['msg'] = "erreur";
        header("Location: contact.php");
    exit;
    }

?>