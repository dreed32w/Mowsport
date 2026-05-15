<?php
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <link rel="stylesheet" href="styles/payment.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <a href="index.php"><img src="images/logo-modified.png" alt="logo"></a>
        </div>

        <div class="secure-title">
            Paiement sécurisé
        </div>

    </header>

    <main class="payment-container">

        <section class="left-side">

            <div class="resume-box">
                <h2>Récap réservation</h2>

                <div class="resume-content">
                    <p></p>
                    <p></p>
                    <p></p>
                </div>
            </div>


            <div class="card-box">

                <div class="card-title">
                    Informations sur la carte
                </div>

                <div class="card-content">

                    <div class="payment-method">
                        <img src="images/icons/card.png" alt="card">

                        <span>Paiement par carte</span>

                        <img src="images/icons/cards.png" alt="cards">
                    </div>


                    <form action="send_users.php" method="post" onsubmit="return checkform(event)" id="formm">
                        
                        <input type="hidden" name="total" id="total_in">

                        <div class="form-row">
                            <div class="form-group">
                                <label>Le nom du titulaire de la carte:</label>
                                <input type="text" placeholder="Entrez le nom">
                            </div>

                            <div class="form-group">
                                <label>Le numero de carte:</label>
                                <input type="text" placeholder="xxxx  xxxx  xxxx  xxxx" maxlength="19" inputmode="numeric">
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group">
                                <label>Date d'expiration:</label>

                                <div class="small-inputs">
                                    <input type="text" placeholder="mm" minlength="2" maxlength="2" inputmode="numeric">
                                    <input type="text" placeholder="yy" minlength="2" maxlength="2" inputmode="numeric">
                                </div>
                            </div>

                            <div class="form-group small-cvv">
                                <label>CVV:</label>
                                <input type="text" placeholder="XXX" minlength="3" maxlength="3" inputmode="numeric">
                            </div>

                        </div>

                    


                    <div class="security">

                        <h3>
                            <img src="images/icons/sec.png"> MOWSPORT protège vos informations de paiement
                        </h3>

                        <p>✓ Nous respectons la norme de sécurité des données de l'industrie des cartes de paiement (PCI DSS) lors du traitement des données de cartes.</p>

                        <p>✓ Toutes les informations restent sécurisées et intègres.</p>

                        <p>✓ Vos informations de carte ne seront jamais utilisées à mauvais escient ni vendues.</p>

                    </div>


                    <div class="pay-btn">
                        <button type="submit">payer</button>
                    </div>
                    </form>

                </div>
            </div>

        </section>



        <aside class="right-side">

            <div class="summary-box">

                <h2>Contenu du paiement</h2>

                <div class="summary-line"><span>Le terrain</span><span></span></div>

                <div class="summary-line"><span>Le temps</span><span></span></div>

                <div class="summary-line multi-line"><span>Le prix d'un terrain<br>multiplié par le temps</span><span></span></div>

                <div class="separator"></div>

                <div class="total-line"><span>Total</span><span></span></div>

            </div>

        </aside>

    </main>


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
<script>

    // pour get user info 

    let p = document.querySelectorAll('.resume-content p')
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_SESSION['prenom'] = htmlspecialchars($_POST['prenom']);
            $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
            $_SESSION['email'] = htmlspecialchars($_POST['email']);
            $_SESSION['age'] = htmlspecialchars($_POST['age']);
            $_SESSION['cin'] = htmlspecialchars($_POST['cin']);
            $_SESSION['phone'] = htmlspecialchars($_POST['phone']);
            $_SESSION['city'] = htmlspecialchars($_POST['city']);
            $_SESSION['date_op'] = htmlspecialchars($_POST['date_op']);
            $_SESSION['temp_op'] = htmlspecialchars($_POST['temp_op']);
            $_SESSION['dure'] = htmlspecialchars($_POST['dure']);
            if($_SESSION['dure'] === "plus"){
                if (isset($_POST['dure2']) && !empty($_POST['dure2'])) {
                    $_SESSION["dure"] = htmlspecialchars($_POST['dure2']);
                }
            }
            $_SESSION['terrain_name'] = htmlspecialchars($_POST['terrain_name']);
            $_SESSION['nb_players'] = htmlspecialchars($_POST['nb_players']);
                
            
        }
    
    ?>
    p[0].innerHTML = "<?php if(isset($_SESSION['nom']) && isset($_SESSION['prenom'])) echo $_SESSION['nom'].'/'.$_SESSION['prenom'];?>"
    p[1].innerHTML = "<?php if(isset($_SESSION['email']) && isset($_SESSION['phone']) && $_SESSION['terrain_name']) echo $_SESSION['email'].'/'.$_SESSION['phone'].'/'.$_SESSION['terrain_name'];?>"
    p[2].innerHTML = "<?php if(isset($_SESSION['dure']) && isset($_SESSION['nb_players'])) echo "-".$_SESSION['dure'].'MIN  -'.$_SESSION['nb_players'].' joueurs';?>"
    /*

*/
// pour get le prix de terrain 
    let span = document.querySelectorAll(".summary-box span")
    let terrain_name = "<?=$_SESSION['terrain_name']?>";
    async function get_prix(terrain_name) {
            let res = await fetch("get_terrains.php?terrain_name="+ terrain_name)
            let repons = await res.json()
            if (repons.length === 0){
                    window.location.href = "index.php#toto";
                    return;
            }
            span[1].innerHTML = repons[0].price_per_hour + " MAD";

            let dure_text = p[2].innerText;
            let dure = dure_text.split("-")[1].trim();

            span[3].innerHTML = dure;

            let price = parseFloat(repons[0].price_per_hour);

            let total = (price / 90) * parseInt(dure, 10);

            span[5].innerHTML = total + " MAD";
            span[7].innerHTML = total + " MAD";
            document.getElementById("total_in").value = total;
            
            
    }
    get_prix(terrain_name);

    function checkform(event) {
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
                    window.location.href = "payment.php#formm";

                    return false;
                }
    
                return true;
            }
</script>


</body>
</html>
