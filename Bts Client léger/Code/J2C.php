<!DOCTYPE html>
<html lang="en">

<head>
  <title>Accueil</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/js/uikit-icons.min.js"></script>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js
" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />


  <style>
    #body {
      background-color: whitesmoke;
    }

    /* Image test */
    .fakeimg {
      background-color: rgb(176, 174, 174);
      height: 200px;
    }

    /* Change la taille des div contenant une image avec la classe "imgDerNot" */
    /* imgDerNot = Images dernières notes */
    div img.imgDerNot {
      width: 300px;
      height: 200px;
    }

    div img.imgCarous {
      width: 300px;
      height: 300px;
    }

    div img.imgClas {
      width: 400px;
      height: 300px;
    }
  </style>


</head>

<?php

// CONNEXION BDD

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "c2j";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  // Si erreur renvoie un message d'erreur
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

// Si pas déclarer remplace par une chaine vide (pour eviter les erreurs)
if (!isset($_POST['email'])) {
  $email = "";
}
if (!isset($_POST['pseudo'])) {
  $pseudo = "";
}
if (!isset($_POST['mdp'])) {
  $mdp = "";
}

// Attribution variable champs formulaire
$email = $_POST['email'];
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];


// REQUETE INSERT QUI INSERE LES DONNEES DANS LA BDD
$sql = "INSERT INTO inscription (email, pseudo, mdp)
VALUES ('$email', '$pseudo', '$mdp')";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Ferme la requete
$conn->close();


?>

<body id="body">

  <!-- HEADER -->

  <!-- BARRE DE NAVIGATION -->

  <nav id="nav" class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Critique2Jeux</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" 
      aria-expanded="false"  aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarScroll">
        <img src="https://thumbs.dreamstime.com/b/contr-leur-icon-logo-de-jeu-de-joypad-de-manette-80756896.jpg" alt="erreur" width="50px">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#myModal" aria-current="page" href="#">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Jeux</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Autres
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <button id="Sombre" class="btn btn-outline-dark mx-2 " type="submit">Mode Sombre</button>
      </div>
    </div>
  </nav>











  <!-- LA FENETRE MODAL CONNEXION -->
  <!-- The Modal -->
  <div class="modal fade " id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="p-2   ">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated">
              <h4 class="text-center display-6 ">Inscription</h4>

              <div class="mb-3 mt-3 ">
                <label for="email" name="email" class="form-label">
                  <h6 class="text-dark">Email:</h6>
                </label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>


              <div class="mb-3 mt-3 ">
                <label for="pseudo" name="pseudo" class="form-label">
                  <h6 class="text-dark">Pseudo:</h6>
                </label>
                <input type="text" class="form-control" id="pseudo" placeholder="Enter pseudo" name="pseudo" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>

              <div class="mb-3">
                <label for="mdp" class="form-label">
                  <h6 class="text-dark">Password:</h6>
                </label>
                <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>

              <div class="form-check mb-3 text-center justify-content-center">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember" required> Vous accepter de donner ces informations en cochant cette case.
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </label>

              </div>
              <div class=" container  text-center">
                <button type="submit" class="btn btn-dark   ">Submit</button> <br> <br>
              </div>

              <a style="text-decoration: none;" class=" text-light text-center " href="">
                <h6>Clique ici, pour te connecter!</h6>
              </a>
            </form>
          </div>
        </div>


        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <!-- HEADER -->
















  <!-- BODY -->

  <!-- BLOC 3 IMAGES DERNIERES NOTATIONS -->

  <section>
    <!-- Bloc des dernier jeux notés -->
    <div class="container  text-white text-center">

      <div class="row">
        <p class=" display-6 p-5 bg-dark"> - Dernieres notations - </p>
        <div class=" col-sm-4 uk-animation-slide-top-medium">
          <img class="imgDerNot rounded-3" src="../Image/ds3.webp" alt="Responsive image">
          <div>
            <h5 class=" p-2">Dark Souls 3 : <h5 class="text-success">9/10</h5>
            </h5>
          </div>
        </div>

        <div class=" col-sm-4 uk-animation-slide-bottom-medium">
          <img class="imgDerNot rounded-3" src="../Image/Taiko no Tatsujin The Drum Master .webp" alt="Responsive image">
          <div>
            <h5 class=" p-2">Taiko no Tatsujin The Drum Master : <h5 class="text-warning">6/10</h5>
            </h5>
          </div>
        </div>
        <div class=" col-sm-4 uk-animation-slide-top-medium">
          <img class="imgDerNot rounded-3" src="../Image/hallo.webp" alt="Responsive image">
          <div>
            <h5 class=" p-2 " style="border-radius: 10px;">Hallo 5 : <h5 class="text-danger">2/10</h5>
            </h5>

          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- BLOC 3 IMAGES DERNIERES NOTATIONS -->
















  <section>
    <div class="container bg-danger">
      <h1 class=" display-6 text-center p-5 text-white"> - Prochaines Sorties - </h1>
    </div>

    <!-- CARROUSEL IMAGES DERNIERES SORTIES -->
    <div uk-slider="autoplay: true; autoplay-interval: 5000; pause-on-hover: true;" class="my-5">
      <div class="uk-position-relative uk-visible-toggle uk-light uk-grid-stack " tabindex="-1">

        <ul class=" uk-slider-items">

          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/Starfield.webp" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Starfield</h5>
              <p class="uk-margin-remove">2023</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/Mario_Strikers_Battle_League_Football.jpg" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Mario Strikers Battle League Football</h5>
              <p class="uk-margin-remove">10 Juin 2022</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/ds3.webp" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Dark Souls 3</h5>
              <p class="uk-margin-remove">24 Mars 2016</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/hallo.webp" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Hallo 5</h5>
              <p class="uk-margin-remove">27 octobre 2015</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/Taiko no Tatsujin The Drum Master .webp" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Taiko no Tatsujin The Drum Master</h5>
              <p class="uk-margin-remove">27 Janvier 2022</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/A Plague Tale Requiem.jpg" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">A Plague Tale Requiem</h5>
              <p class="uk-margin-remove">2022</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/Sniper Elite 5.jpg" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Sniper Elite 5</h5>
              <p class="uk-margin-remove">26 May 2022</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../ImagE/Splatoon 3.jpg" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Splatoon 3</h5>
              <p class="uk-margin-remove">9 septembre 2022</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/Forspoken.webp" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Forspoken</h5>
              <p class="uk-margin-remove">11 octobre 2022</p>
            </div>

          </li>
          <li class="uk-transition-toggle" tabindex="0">
            <img class="imgCarous rounded-3" src="../Image/Nintendo Switch Sports.jpg" width="400" height="600" alt="">
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom-medium">
              <h5 class="uk-margin-remove">Nintendo Switch Sports</h5>
              <p class="uk-margin-remove">29 Avril 2022</p>
            </div>
          </li>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

      </div>

    </div>

    <!-- CARROUSEL IMAGES DERNIERES SORTIES -->

  </section>















  <main>
    <!-- Bloc meilleurs notes (jeux) -->
    <div class="container p-5 bg-dark text-white text-center ">
      <h1 class="text-white display-6"> - Classement des meilleurs jeux -</h1>
      <p>Selon vous!</p>
    </div>
    <!-- Colonnes classement jeux -->
    <div class="container-fluid p-5">
      <div class="row my-5">
        <!-- Colonne de gauche -->
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-6">
              <h4>1er / Mario_Strikers... / <h5 class="text-primary">?/10</h5>
              </h4>
              <img class="imgClas rounded-3" src="../Image/Mario_Strikers_Battle_League_Football.jpg" alt="">
            </div>
            <div class="col-sm-6">
              <h4>Info</h4>
              <h5>Sortie le 7 Dec, 2022</h5>
              <h5>Synopsis</h5>
              <p>Mario Strikers : Battle League Football est le nouveau volet de la saga Mario Striker. Incarnez les personnages emblématiques 
                de la licence Super Mario Bros et affrontez vous dans des matchs de football endiablés.</p>
            </div>

            <div class="row my-5">
              <div class="col-sm-6">
                <h4>Classement / Jeux / Note</h4>
                <img class="imgClas rounded-3" src="../Image/Starfield.webp" alt="">
              </div>
              <div class="col-sm-6">
                <h4>Info</h4>
                <h5>Sortie le 7 Dec, 2020</h5>
                <h5>Synopsis</h5>
                <p></p>
              </div>
            </div>

            <div class="row ">
              <div class="col-sm-6">
                <h4>Classement / Jeux / Note</h4>
                <img class="imgClas rounded-3" src="../Image/ds3.webp" alt="">
              </div>
              <div class="col-sm-6">
                <h4>Info</h4>
                <h5>Sortie le 7 Dec, 2020</h5>
                <h5>Synopsis</h5>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do
                  eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco.</p>
              </div>
            </div>
          </div>
        </div>


        <!-- Colonne de droite -->
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-6">
              <h4>2ème / Halo 5 / <h5 class="text-danger">2/10</h5>
              </h4>
              <img class="imgClas rounded-3" src="../Image/hallo.webp" alt="">
            </div>
            <div class="col-sm-6">
              <h4>Info</h4>
              <h5>Sortie le 7 Dec, 2020</h5>
              <h5>Synopsis</h5>
              <p>Halo 5: Guardians sur Xbox One est un FPS mettant en scène les aventures du Master Chief et d'un nouveau personnage, 
                le Spartan Jameson Locke. Le jeu dispose également d'une importante partie multijoueur et reprend les modes de jeu 
                connus de la série, mais compte également deux nouveautés, la Warzone et le mode Elimination. Pour gagner,
                 les joueurs pourront compter sur les nombreuses nouveautés de gameplay qui rendent les Spartans plus dynamiques qu'auparavant.</p>
            </div>

            <div class="row my-5">
              <div class="col-sm-6">
                <h4>Classement / Jeux / Note</h4>
                <img class="imgClas rounded-3" src="../Image/Taiko no Tatsujin The Drum Master .webp" alt="">
              </div>
              <div class="col-sm-6">
                <h4>Info</h4>
                <h5>Sortie le 7 Dec, 2020</h5>
                <h5>Synopsis</h5>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do
                  eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco.</p>
              </div>
            </div>

            <div class="row ">
              <div class="col-sm-6">
                <h4>Classement / Jeux / Note</h4>
                <img class="imgClas rounded-3" src="../Image/Mario_Strikers_Battle_League_Football.jpg" alt="">
              </div>
              <div class="col-sm-6">
                <h4>Info</h4>
                <h5>Sortie le 7 Dec, 2020</h5>
                <h5>Synopsis</h5>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do
                  eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>


</body>








<footer class="container-fluid bg-dark text-center text-white p-2 ">
  <h6 class="text-white">Mentions Légales</h6>
</footer>














<script>
  // Bouton mode sombre
  let z = ['gray', 'whitesmoke'];
  let y;
  let x = document.getElementById('Sombre');
  let v = document.getElementById('body');

  x.addEventListener('click', alert);

  function alert() {
    y = Math.floor(Math.random() * 2);
    v.style.background = z[y];

  }
</script>

</html>