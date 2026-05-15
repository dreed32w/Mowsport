<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body>

<header class="navbar">
    <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="logo"></a>
    </div>

    <div class="menu-toggle">☰</div>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="terrains.html">Terrains</a>
        <a href="About.html">À propos</a>
        <a href="contact.php" class="active">Contact</a>
    </nav>

    <a href="index.php#toto"><button class="btn" id="superbtn">Ajouter un rendez-vous</button></a>
</header>


<section class="contact-header">
    <h2>Contactez-nous</h2>
    <p>Nous sommes là pour répondre à toutes vos questions</p>
</section>


<section class="contact-container">


    <div class="form-box">
        <h3>Envoyez-nous un message</h3>

        <form action="save_commants.php" method="post" id="form" onsubmit="return checkinp(event)">
            <label>Votre nom :</label>
            <input type="text" placeholder="Entrez votre nom" name="nom">

            <label>Votre email :</label>
            <input type="email" placeholder="Email@exemple.com" name="email">

            <label>Sujet :</label>
            <input type="text" placeholder="Le sujet" name="sujet">

            <label>Le message :</label>
            <textarea placeholder="Le message" name="message"></textarea>

            <button type="submit" class="btn">Envoyer</button>
        </form>
    </div>

    <div class="info-box">
    <h3>Informations de contact</h3>

    <div class="info-item">
        <span>BTS-Errachidia-Maroc</span>
        <img src="images/contactimg/location.png">
    </div>

    <div class="info-item">
        <span>+212679231522</span>
        <img src="images/contactimg/phone.png">
    </div>

    <div class="info-item">
        <span>mowsport@gmail.com</span>
        <img src="images/contactimg/email.png">
    </div>

    <div class="socials">
        <a href="https://facebook.com"><img src="images/contactimg/facebook.png"></a>
        <a href="https://x.com"><img src="images/contactimg/x.png"></a>
        <a href="https://linkedin.com"><img src="images/contactimg/linkdin.png"></a>
        <a href="https://instagram.com"><img src="images/contactimg/instagram.png"></a>
        <a href="https://youtube.com"><img src="images/contactimg/youtube.png"></a>
        <a href="https://tiktok.com"><img src="images/contactimg/tiktok.png"></a>
    </div>
</div>


</section>


<footer class="footer">
    <div class="footer-container">

        <div class="footer-left">
            <a href="mailto:mowsport@gmail.com"><p>mowsport@gmail.com</p></a>
            <p>+212679231522</p>
        </div>

        <div class="footer-center">
            <a href="condutions.html"><p>conditions</p></a>
            <a href="About.html"><p>Qui sommes-nous ?</p></a>
        </div>

      
        <div class="footer-right">
            <img src="images/logo-modified.png" class="footer-logo"> 
            
            <div class="socials">
                <a href="https://facebook.com"><img src="images/icons/facebook.png"></a>
                <a href="https://instagram.com"><img src="images/icons/instagram.png"></a>
                <a href="https://x.com"><img src="images/icons/twitter.png"></a>
                <a href="https://youtube.com"><img src="images/icons/youtube.png"></a>
                <a href="https://tiktok.com"><img src="images/icons/tiktok.png"></a>
                <a href="https://linkedin.com"><img src="images/icons/linkedin.png"></a>
            </div>
        </div>

    </div>

    <p class="copyright">© 2026 MOWSPORT - Tous droits réservés</p>
</footer>

<?php if(isset($_SESSION['msg'])):?>
<script>
    alert("<?=$_SESSION['msg']?>")
</script>
<?php unset($_SESSION['msg']); ?>
<?php endif; ?>
<script>
    function checkinp(event){
        let inputs = document.querySelectorAll("input, textarea");
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
                    window.location.href = "contact.php#form";

                    return false;
                }
    
                return true;
    }
    document.querySelector(".menu-toggle").onclick = () => {
                document.querySelector("nav").classList.toggle("active");
        };
</script>

</body>
</html>
