<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mowsport</title>
<link rel="stylesheet" href="styles/main.css">
<link rel="icon" type="image/png" href="images/logo.png">
</head>


<body>

<header class="navbar">
    <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="logo"></a>
    </div>
    <div class="menu-toggle">☰</div>

    <nav>
        <a href="index.php" class="active">Accueil</a>
        <a href="terrains.html">Terrains</a>
        <a href="About.html">À propos</a>
        <a href="contact.php">Contact</a>
    </nav>
    <a href="#toto"><button class="btn" id="superbtn">Ajouter un rendez-vous</button></a>
</header>

<section class="hero">
    <img src="images/fort.jpg" class="hero-img"> 
    <div class="hero-content">
        <h1>Réservez un terrain de football dès maintenant!</h1>
        <a href="#toto"><button class="btn-purple">Prendre rendez-vous</button></a>
        <div class="divsmi">
          <p>Si vous souhaitez obtenir plus d'informations sur nous et nos services</p>
          <a href="About.html"><button class="btn-small">À propos de nous</button></a>
        </div>
    </div>
</section>

<section class="section stade">
    <h2>Privilèges du stade</h2>
    <div class="privilege">
        <img src="images/cp.PNG">
        <p>
            Notre plateforme est conçue pour rendre la location de terrains de football rapide et fiable. Nous proposons une variété de terrains équipés selon les normes les plus exigeantes, avec la possibilité de réserver à l'avance, de choisir un horaire qui vous convient et de consulter tous les détails avant votre match. Notre objectif 
            est de mettre en relation les joueurs et les terrains de la manière la plus simple possible.
        </p>
    </div>
    <a href="#toto"><button class="btn" id="btn-Aja">Ajouter un rendez-vous</button></a>
</section>

<section class="section">
    <h2>Types d'aires de jeux disponibles</h2>
    <div class="cards">
        <div class="card">
            <img src="images/v1.jfif"> 
            <p>Terrains de gazon artificiel de haute qualité</p>
        </div>
        <div class="card">
            <img src="images/v2.jfif"> 
            <p>Emplacements en gazon naturel</p>
        </div>
        <div class="card">
            <img src="images/v3.jfif"> 
            <p>Stades illuminés pour les matchs nocturnes</p>
        </div>
        <div class="card">
            <img src="images/v4.jfif"> 
            <p>Aires de jeux intérieures et extérieures</p>
        </div>
    </div>
</section>


<section class="section">
    <h2>Comment fonctionne le site ?</h2>
    <ol>
        <li>Sélectionnez une ville ou une région</li>
        <li>Parcourir les stades disponibles</li>
        <li>Sélectionnez la date et l'heure</li>
        <li>Finalisez votre réservation</li>
        <li>Si problème, veuillez nous le signaler</li>
    </ol>
</section>

<section class="section">
    <h2>Avis clients</h2>

    <div class="avis">
        <img src="images/cliens/c1.jfif"> 
        <div>
            <h3>Alexander</h3>
            <p>Une expérience fantastique ! La réservation était facile et le terrain excellent.</p>
        </div>
        <span><img src="images/cliens/5starts.png" alt=""></span>
    </div>

    <div class="avis">
        <img src="images/cliens/c2.jfif"> 
        <div>
            <h3>Henry</h3>
            <p>Le service pratique nous a fait gagner un temps précieux.</p>
        </div>
        <span><img src="images/cliens/5starts.png" alt=""></span>
    </div>

    <div class="avis">
        <img src="images/cliens/c3.jfif"> 
        <div>
            <h3>Oliver</h3>
            <p>Je le recommande à tous les fans de football.</p>
        </div>
        <span><img src="images/cliens/4start.png" alt=""></span>
    </div>
</section>

<section class="section form">
    <h2 id="toto">Inscription</h2>
<form action="payment.php" method="post" onsubmit="return checkform(event)">
    <div class="grid" >
        <input placeholder="Votre prénom" class="input" type="text" name="prenom">
        <input placeholder="Votre nom" class="input" type="text" name="nom">
        <input placeholder="Adresse email" class="input" type="text" name="email">
        <input placeholder="Âge" class="input" type="text" name="age">
        <input placeholder="CIN" class="input" type="text" name="cin">
        <input placeholder="Téléphone" class="input" type="text" name="phone">
        <select class="input" id="city" name="city">
            <option value="1" <?= (($_GET['city'] ?? '') == 1) ? 'selected' : '' ?>>Safi</option>
            <option value="2" <?= (($_GET['city'] ?? '') == 2) ? 'selected' : '' ?>>Casablanca</option>
            <option value="3" <?= (($_GET['city'] ?? '') == 3) ? 'selected' : '' ?>>Errachidia</option>
            <option value="4" <?= (($_GET['city'] ?? '') == 4) ? 'selected' : '' ?>>Rabat</option>
            <option value="5" <?= (($_GET['city'] ?? '') == 5) ? 'selected' : '' ?>>Marrakech</option>
            <option value="6" <?= (($_GET['city'] ?? '') == 6) ? 'selected' : '' ?>>Mohammedia</option>
            <option value="7" <?= (($_GET['city'] ?? '') == 7) ? 'selected' : '' ?>>Agadir</option>
            <option value="8" <?= (($_GET['city'] ?? '') == 8) ? 'selected' : '' ?>>Fes</option>
        </select>

        <input class="input" type="date" name="date_op">
        <input class="input" type="time" name="temp_op">
        <select id="dure" class="input" name="dure">
            <option value="90">90 MIN</option>
            <option value="180">180 MIN</option>
            <option value="360">360 MIN</option>
            <option value="plus">plus</option>
        </select>
        <div class="terrain-input">
            <input type="text" class="input" id="chinput" placeholder="Choisir un terrain" name="terrain_name" value="<?php echo $_GET['name'] ?? ''; ?>">
            <img src="images/plus_icon.png" id="img_plus" onclick="Choisterr()">
        </div>

        <input placeholder="Nombre de joueurs" class="input" type="text" name="nb_players">
    </div>
    <div class="cond-check"><input type="checkbox"  id="check" required>  Vous acceptez touts les <a href="condutions.html" style="text-decoration: none;">condutions</a><br><br></div>

    <button class="btn-purple" type="submit">Suivant</button>
    </form>
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

<script src="MyJ.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
        
        document.querySelector(".menu-toggle").onclick = () => {
                document.querySelector("nav").classList.toggle("active");
        };

        let dure = document.querySelector("#dure")
        
        dure.addEventListener('change', (event) => {
            let exinp = document.querySelector("#newdure");
            if (event.target.value === 'plus') {
                 if (!exinp) {
                    let elem = document.createElement('input');
                    elem.id = "newdure";
                    elem.className = "input";
                    elem.placeholder = "Entrez la durée (min)";
                    elem.type = "number";
                    elem.name = "dure2"
            
                    dure.after(elem);
                }
        } else {
            if (exinp) {
                exinp.remove();
                
            }
        }
        });



        
            let is_fser = false;


            function Choisterr() {

                if (is_fser) return;

                document.body.style.overflow = "hidden";

                overp = document.createElement("div");
                overp.style.position = "fixed";
                overp.style.top = "0";
                overp.style.left = "0";
                overp.style.width = "100%";
                overp.style.height = "100%";
                overp.style.background = "rgba(0,0,0,0.45)";
                document.body.appendChild(overp);

                FT = document.createElement("div");
                FT.style.cssText = `
                    width:50%;
                    max-width:600px;
                    background:white;
                    position:fixed;
                    top:50%;
                    left:50%;
                    transform:translate(-50%,-50%);
                    padding:20px;
                    border-radius:10px;
                    z-index:3000;
                `;

                FT.innerHTML = `
                    <div style="display:flex;justify-content:space-between">
                        <h3>Terrains</h3>
                    	<p>choisir un terrain</p>
                        <span onclick="closett()" style="cursor:pointer">X</span>
                    </div>

                    <div id="terrainsBox" ></div>
                `;

                document.body.appendChild(FT);

                is_fser = true;

                let city_id = document.querySelector("select").value;

                loadTerrains(city_id);
            }



            async function loadTerrains(city_id){

                let res = await fetch("get_terrains.php?city_id=" + city_id);
                let data = await res.json();

                let box = document.getElementById("terrainsBox");

                if(data.length === 0){
                    box.innerHTML = "Ne pas des terrains";
                    return;
                }

                box.innerHTML = "";

                data.forEach(t => {
                    box.innerHTML += `
                        <div class="terr-d">
                            <img src="${t.image}" class="terr-img">
                            <div class="terr-det">
                                <h4 class="terr-nom">${t.terrain_name}</h4>
                                <p class="terr-prix"> ${t.price_per_hour} DH / heure </p>
                            </div>
                            <button onclick="selectTerrain('${t.terrain_name}')" class="ter-btn-sel">
                                Choisir
                            </button>
                        </div>
                        `;


                });
            }



            function selectTerrain(name){
                document.getElementById("chinput").value = name;
                closett();
            }



            function closett() {

                if (!FT) return;

                FT.style.opacity = "0";
                FT.style.transform = "translate(-50%, -50%) scale(0.85)";
                overp.style.opacity = "0";

                setTimeout(() => {
                    FT.remove();
                    overp.remove();

                    
                    is_fser = false;

                    document.body.style.overflow = "";
                }, 300);
            }

            
            function checkform(event) {
                let inputs = document.querySelectorAll("input, select");
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
                    window.location.href = "index.php#toto";

                    return false;
                }
    
                return true;
            }





    </script>

</body>
</html>
