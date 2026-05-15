<?php
$conn = new mysqli(
    "localhost",
    "root",
    "",
    "mowsport"
);
$id = $_GET['id'];
$sql = "SELECT * FROM terrains WHERE id = $id";
$result = $conn->query($sql);
$terr_infos = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$terr_infos['terrain_name']?> - MOWSPORT</title>
    <link rel="stylesheet" href="styles/terr_des.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body>
    <div class="nav-overlay"></div>

    <header class="navbar">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="logo"></a>
        </div>

        <div class="menu-toggle">☰</div>

        <nav>
            <a href="index.php">Accueil</a>
            <a href="terrains.html" class="active">Terrains</a>
            <a href="About.html">À propos</a>
            <a href="contact.php">Contact</a>
        </nav>
        <a href="index.php#toto"><button class="btn" id="superbtn">Ajouter un rendez-vous</button></a>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="terrain-grid">
                <div class="gallery-section">
                    <div class="main-img-wrapper">
                        <img src="<?=$terr_infos['image']?>" id="cover" alt="Terrain Image">
                        <div class="price-badge"><?=$terr_infos['price_per_hour']?> DH <span>/ 90min</span></div>
                    </div>
                    <div class="thumbnails">
                        <img src="<?=$terr_infos['image']?>" class="thumb active" onclick="changeO(this)">
                        <img src="<?=$terr_infos['image_J1']?>" class="thumb" onclick="changeO(this)">
                        <img src="<?=$terr_infos['image_J2']?>" class="thumb" onclick="changeO(this)">
                        <img src="<?=$terr_infos['image_J3']?>" class="thumb" onclick="changeO(this)">
                    </div>
                </div>

                <div class="details-section">
                    <div class="info-card">
                        <span class="location-tag"> <?=$terr_infos['city_name']?></span>
                        <h1 class="terrain-title"><?=$terr_infos['terrain_name']?></h1>
                        
                        <div class="quick-description">
                            <p><?=$terr_infos['description']?></p>
                        </div>

                        <div class="full-description">
                            <h3>À propos de ce terrain</h3>
                            <p><?=$terr_infos['big_description']?></p>
                        </div>

                        <div class="features-mini">
                            <div class="feat"> Vestiaires</div>
                            <div class="feat"> Parking</div>
                            <div class="feat"> Éclairage</div>
                        </div>

                        <div class="action-box">
                            <a href="index.php?name=<?=$terr_infos['terrain_name']?>&city=<?=$terr_infos['city_id']?>#toto" class="btn-book">
                                Réserver maintenant
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <a href="mailto:mowsport@gmail.com"><p>mowsport@gmail.com</p></a>
                <p>+212 679 231 522</p>
            </div>

            <div class="footer-center">
                <a href="condutions.html"><p>Conditions d'utilisation</p></a>
                <a href="About.html"><p>Qui sommes-nous ?</p></a>
            </div>

            <div class="footer-right">
                <img src="images/logo-modified.png" class="footer-logo"> 
                <div class="socials">
                    <a href="#"><img src="images/icons/facebook.png"></a>
                    <a href="#"><img src="images/icons/instagram.png"></a>
                    <a href="#"><img src="images/icons/twitter.png"></a>
                    <a href="#"><img src="images/icons/youtube.png"></a>
                    <a href="#"><img src="images/icons/tiktok.png"></a>
                    <a href="#"><img src="images/icons/linkedin.png"></a>
                </div>
            </div>
        </div>
        <p class="copyright">© 2026 MOWSPORT - Tous droits réservés</p>
    </footer>

    <script>
        const menuToggle = document.querySelector(".menu-toggle");
        const nav = document.querySelector("nav");
        const overlay = document.querySelector(".nav-overlay");

        menuToggle.onclick = () => {
            nav.classList.toggle("active");
            overlay.classList.toggle("active");
        };

        overlay.onclick = () => {
            nav.classList.remove("active");
            overlay.classList.remove("active");
        };

        function changeO(imgElement){
            document.querySelector("#cover").src = imgElement.src;
            document.querySelectorAll(".thumb").forEach(t => t.classList.remove("active"));
            imgElement.classList.add("active");
        }
    </script>
</body>
</html>