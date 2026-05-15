<?php
session_start();
$admin_file = file_get_contents('admin_file.json');
$json = json_decode($admin_file, true);
$admin_name = $json['username'];
$admin_password = $json['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $admin_name && $password == $admin_password) {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('les information invalidee')</script>";
    }
}
?>
<head>
    <title>login-admin</title>
    <link rel="stylesheet" href="styles-adm/login.css">
    <link rel="icon" type="image/png" href="../images/logo.png">
</head>
<body>
    <div class="logo"><img src="../../images/logo.png" alt="Mowsport"></div>
    <center>
<form method="POST" id="form" onsubmit="return checkinp(event)">
    <p>Connectez-vous au compte administrateur</p>
    <input name="username" placeholder="le nom d'utilisteur" class="input">
    <input name="password" type="password" placeholder="le mot de pass" class="input">
    <button class="btn">Login</button>
</form>
    </center>
    
<a href="https://mowsport.wuaze.com">Page d'accueil</a>
<script>
    function checkinp(event){
        let inputs = document.querySelectorAll("input");
                let is_null = false;

                for (let inp of inputs) {
                    if (inp.value === "") {
                        inp.style.border = 'red solid 2px'
                        is_null = true;
                        break; 
                    }
                }

                if (is_null) {
                    if (event) event.preventDefault(); 
        
                    alert("Remplissez tous les champs");
                    window.location.href = "login.php#form";

                    return false;
                }
    
                return true;
    }
</script>
    

</body>
