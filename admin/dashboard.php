<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<head>
    <link rel="stylesheet" href="styles-adm/dashbord.css">
        <link rel="icon" type="image/png" href="../images/logo.png">

</head>
<body>

<div class="mobile-topbar">
    <button class="menu-toggle" id="menuToggle">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <img src="../images/logo.png" alt="logo">
</div>

<div class="overlay" id="overlay"></div>

<div class="big-per">

<header>

    <div class="boss">
        <div class="logo">
            <img src="../images/logo.png" alt="logo">
        </div>

        <h1>Admin Panel</h1>
    </div>

    <ul>
        <li onclick="terrains_page()">
            <a class="active" id="a1">
                <img src="styles-adm/icons/icon1.png">
                les terrains
            </a>
        </li>

        <li onclick="orders_page()">
            <a id="a2">
                <img src="styles-adm/icons/icon2.png">
                les Demandes
            </a>
        </li>

        <li onclick="commants_page()">
            <a id="a4">
                <img src="styles-adm/icons/icon4.png">
                les messages
            </a>
        </li>
    </ul>

    <p>
        <a onclick="parametre_page()" id="a5">Paramètres</a>
        <br><br>

        <a href="../index.php" id="goto_index">
            aller à la page d'accueil
        </a>
    </p>

</header>

<section class="content"></section>

</div>

<?php if (isset($_SESSION['msg'])): ?>
<script>
    alert("<?= $_SESSION['msg'] ?>");
</script>
<?php unset($_SESSION['msg']); ?>
<?php endif; ?>
<!--admin_info check-->
<?php if (isset($_SESSION['admin_msg'])): ?>
<script>
    alert("<?= $_SESSION['admin_msg'] ?>");
</script>
<?php unset($_SESSION['admin_msg']); ?>
<?php endif; ?>

<script>
    
    let content = document.querySelector(".content")
    let a1 = document.querySelector("#a1")
    let a2 = document.querySelector("#a2")
    let a4 = document.querySelector("#a4")
    let a5 = document.querySelector("#a5")

    async function get_terrains() {
            let res = await fetch("../get_terrains.php")
            let repons = await res.json()
            let terrains_per = document.querySelector(".terrains-per");
            if (repons.length === 0){
                    terrains_per.innerHTML = "Ne pas des terrains";
                    return;
            }
            terrains_per.innerHTML = "";
            repons.forEach(e=>{
                terrains_per.innerHTML += `
                    <div class="terrain">
                        <img src="../${e.image}">
                        <div>
                            <p class="titre">${e.terrain_name}</p>
                            <p class="prix">${e.price_per_hour}DH</p>
                            <p class="city">${e.city_name}</p>
                            <p class="mini-des">${e.description}</p>
                        </div>
                        <button class="suprime" onclick="delet_terrain(${e.id})"><img src="styles-adm/icons/delete.png" ></button>
                    </div>`;

            })
    }

    async function delet_terrain(id) {
        let confrma = confirm("Voulez-vous supprimer ce terrain ?");

        if (!confrma) {
            return;
        }

        let res = await fetch("../delet_terrains.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id=${id}`
        });

        let response = await res.text();

        if (response === "tam") {
            alert("Terrain supprimé avec succès");
            get_terrains();
        } else {
            alert("Erreur de suppression!");
            
        }
}



    function terrains_page(){
        a1.setAttribute("class", "active")
        a2.removeAttribute("class")
        a4.removeAttribute("class")
        a5.removeAttribute("class")
        content.innerHTML = `
                <div class="top-bar">
                    <h2>Les Terrains</h2>
                    <button class="add_terr" onclick="add_terrain()">Ajouter un terrain</button>
                </div>

                <div class="terrains-per">
                </div>`;
        
        
        get_terrains();
    }

    

function add_terrain() {
    content.innerHTML = `
        <div class="top-bar">
            <h2>Ajouter un terrain</h2>
        </div>

        <form action="save_terrain.php" method="POST" enctype="multipart/form-data">

            <input name="terrain_name" placeholder="Nom terrain" class="input" required>

            <select name="city_name" class="input" required>
                <option value="Safi">Safi</option>
                <option value="Casablanca">Casablanca</option>
                <option value="Errachidia">Errachidia</option>
                <option value="Rabat">Rabat</option>
                <option value="Marrakech">Marrakech</option>
                <option value="Mohammedia">Mohammedia</option>
                <option value="Agadir">Agadir</option>
                <option value="Fes">Fes</option>
            </select>

            <input name="price" type="number" placeholder="Prix" class="input" required>

            <textarea name="description" placeholder="Mini-description (150)" required></textarea>

            <textarea name="big-description" placeholder="Grande description" required id="bg-area"></textarea>


            <label class="file-box">
                <input type="file" name="image" accept="image/*" hidden id="fileCover" required>
                <span id="textCover">Cliquez pour choisir l'image cover</span>
            </label>


            <label class="file-box">
                <input type="file" name="image_j1" accept="image/*" hidden id="fileJ1" required>
                <span id="textJ1">Cliquez pour choisir image J1</span>
            </label>


            <label class="file-box">
                <input type="file" name="image_j2" accept="image/*" hidden id="fileJ2" required>
                <span id="textJ2">Cliquez pour choisir image J2</span>
            </label>


            <label class="file-box">
                <input type="file" name="image_j3" accept="image/*" hidden id="fileJ3" required>
                <span id="textJ3">Cliquez pour choisir image J3</span>
            </label>

            <button type="submit">Ajouter</button>

        </form>
    `;

    function fileName(inputId, textId, defaultText) {
        document.getElementById(inputId).addEventListener("change", function () {
            let fileName = this.files.length > 0
                ? this.files[0].name
                : defaultText;

            document.getElementById(textId).innerText = fileName;
        });
    }

    fileName("fileCover", "textCover", "Cliquez pour choisir l'image cover");
    fileName("fileJ1", "textJ1", "Cliquez pour choisir image J1");
    fileName("fileJ2", "textJ2", "Cliquez pour choisir image J2");
    fileName("fileJ3", "textJ3", "Cliquez pour choisir image J3");
}

    //دوال جلب الطلبات و حذفها والبحث و الفيلتر الخ الخ 

    function setupSearch() {
        const searchBox = document.getElementById("search-box");
        const searchBtn = document.getElementById("search-btn");
        const filterSelect = document.getElementById("filter");

        function searchItems() {
            let searchval = searchBox.value.toLowerCase();
            let cityval = filterSelect.value.toLowerCase();

            let cards = document.querySelectorAll(".demand");

            cards.forEach(card => {
                let cin = card.querySelector(".cin").textContent.toLowerCase();
                let city = card.querySelector(".city").textContent.toLowerCase();

                let matchSearch = cin.includes(searchval) || searchval === "";
                let matchCity = cityval === "tout" || city.includes(cityval);

                card.style.display = (matchSearch && matchCity) ? "flex" : "none";
            });
        }

        searchBox.addEventListener("input", searchItems);
        searchBtn.addEventListener("click", searchItems);
        filterSelect.addEventListener("change", searchItems);
    }


    let city_tab=["Safi","Casablanca","Errachidia", "Rabat", "Marrakech","Mohammedia","Agadir","Fes"];

    async function get_demandes() {
            let res = await fetch("../get_users.php")
            let repons = await res.json()
            let demand_per = document.querySelector(".demand-per");
            if (repons.length === 0){
                    demand_per.innerHTML = "Ne pas des demandes";
                    return;
            }
            demand_per.innerHTML = "";
            
            repons.forEach(e=>{
                let demand_item = document.createElement("div")
                demand_item.setAttribute("class", "demand");
                demand_item.innerHTML = `
                    
                    <div class="left-demand">
                        <p class="titre">${e.first_name} ${e.last_name}</p>

                        <p class="prix_terrain_dure">
                            ${e.total}DH | ${e.terrain_name} | ${e.dure}MIN |  | ${e.nb_players} joueurs
                        </p>
                        <p class="city">${city_tab[e.city_id-1]}</p>

                        <p class="cin">CIN : ${e.cin}</p>

                        <p class="date-time">
                            ${e.date_op} | ${e.temp_op}
                        </p>

                        <p class="mini-des">
                            ${e.email} / ${e.phone}
                        </p>
                    </div>

                    <button class="suprime_demand" onclick='delet_user(${e.id})'>
                        <img src="styles-adm/icons/delete.png">
                    </button>
                `;
                demand_per.prepend(demand_item);

            })
    }


    async function delet_user(id) {
        let confrma = confirm("Voulez-vous supprimer l' utilisateur ?");

        if (!confrma) {
            return;
        }

        let res = await fetch("delet_user.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id=${id}`
        });

        let response = await res.text();

        if (response === "tam") {
            alert("l'utilisateur supprimé avec succès");
            window.location.reload();
        } else {
            alert("Erreur de suppression!");
            
        }
    }



    function orders_page(){
        a5.removeAttribute("class")
        a1.removeAttribute("class")
        a4.removeAttribute("class")
        a2.setAttribute("class", "active")
        content.innerHTML = `
            <div class="top-bar">
                <h2>Les Demandes</h2>

                <div class="top-actions">
                    <input type="text" placeholder="Rechercher par CIN..." class="search-demand" id="search-box">

                    <button class="search-btn" id="search-btn">
                        <img src="styles-adm/icons/search.png">
                    </button>

                    <select class="filter-city" id="filter">
                        <option value="tout">tout</option>
                        <option value="Safi">Safi</option>
                        <option value="Casablanca">Casablanca</option>
                        <option value="Errachidia">Errachidia</option>
                        <option value="Rabat">Rabat</option>
                        <option value="Marrakech">Marrakech</option>
                        <option value="Mohammedia">Mohammedia</option>
                        <option value="Agadir">Agadir</option>
                        <option value="Fes">Fes</option>
                    </select>
                </div>
            </div>
            <div class="demand-per">

                
            </div>
        `;
        get_demandes()
        setupSearch();
    }

    //les message d-users et les commanteres

    async function delet_commant(id) {
        let confrma = confirm("Voulez-vous supprimer le commetaire ?");

        if (!confrma) {
            return;
        }

        let res = await fetch("delet_commant.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id=${id}`
        });

        let response = await res.text();

        if (response === "tam") {
            alert("l'utilisateur supprimé avec succès");
            window.location.reload();
        } else {
            alert("Erreur de suppression!");
            
        }
    }

    async function get_commants() {
            let res = await fetch("get_commants.php")
            let repons = await res.json()
            let commants_per = document.querySelector(".commants-per");
            if (repons.length === 0){
                    commants_per.innerHTML = "Ne pas des commentaire";
                    return;
            }
            commants_per.innerHTML = "";
            repons.forEach(e=>{
                commants_per.innerHTML += `
                    <div class="commant-box">
                        <div>
                            <p class="nom">${e.nom}</p>
                            <p class="email">${e.email}</p>
                            <p class="sujet">${e.sujet}</p>
                            <p class="message">${e.message}</p>
                        </div>
                        <button class="suprime" onclick="delet_commant(${e.id})"><img src="styles-adm/icons/delete.png" ></button>
                    </div>`;

            })
    }
    
    function commants_page(){
        a5.removeAttribute("class")
        a1.removeAttribute("class")
        a2.removeAttribute("class")
        a4.setAttribute("class", "active")
        content.innerHTML = `
            <div class="top-bar">
                    <h2>Les commetaires</h2>
            </div>

            <div class="commants-per">
                
            </div>`;
        get_commants();
    }

    //صفحة الإعدادات 
    function check_info(event){
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

                    return false;
                }
    
                return true;
    }
    function parametre_page(){
        a4.removeAttribute("class")
        a1.removeAttribute("class")
        a2.removeAttribute("class")
        a5.setAttribute("class", "active")
        content.innerHTML = `
            <div class="top-bar">
                    <h2>Les paramétres</h2>
            </div>

            <div class="options">
                <form action="change_admin_info.php" method="post" onsubmit="return check_info(event)">
                    <input type="text" placeholder="entre le mot de pass d'admin " name="admin_pass" id="inp1">
                    <input type="text" placeholder="Entrez votre nouveau nom d'admin " name="new_admin_name" id="inp2">
                    <input type="text" placeholder="Entrez votre nouveau mot de pass d'admin" name="new_admin_pass" id="inp3">
                    <button type="submit">change</button>
            </div>`;
        
    }

    terrains_page()

    //المستطليات الهاتف التي ستظهر في الأعلى 

    const menuToggle = document.getElementById("menuToggle");
    const header = document.querySelector("header");
    const overlay = document.getElementById("overlay");

    menuToggle.addEventListener("click", () => {
        header.classList.toggle("open-sidebar");
        overlay.classList.toggle("show-overlay");
        menuToggle.classList.toggle("active-toggle");
    });

    overlay.addEventListener("click", () => {
        header.classList.remove("open-sidebar");
        overlay.classList.remove("show-overlay");
        menuToggle.classList.remove("active-toggle");
    });
</script>

<div class="overlay" id="overlay"></div>
</body>


