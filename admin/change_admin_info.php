<?php
session_start();
    $admin_file = file_get_contents('admin_file.json');
    $json = json_decode($admin_file, true);
    $admin_password = $json['password'];

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($_POST['admin_pass'] == $admin_password){
            $json['username'] = $_POST['new_admin_name'];
            $json['password'] = $_POST['new_admin_pass'];
            $update_info = json_encode($json, JSON_PRETTY_PRINT);
            file_put_contents('admin_file.json', $update_info);
            $_SESSION['admin_msg'] = "Les informations d'admin sont été mises à jour";
            header("Location: dashboard.php");
            exit;
        }
        else{
            $_SESSION["admin_msg"] = "le mot de pass d'admin invalidée !";
            header("Location: dashboard.php");
            exit;
        }
    }


?>