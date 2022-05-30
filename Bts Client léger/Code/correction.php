<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


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
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

  // REQUETE INSERT QUI INSERE LES DONNEES DANS LA BDD

  $email = $_POST['email'];
  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['mdp'];

  
$sql = "INSERT INTO inscription (email, pseudo, mdp)
VALUES ('$email', '$pseudo', '$mdp')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

if(isset($_POST['email'])){
  echo true;
}else{
  echo false;
}
?>
<br>
Welcome <br>
Your email address is: <b><?php echo $_POST['email']; ?></b>  and your password is <b><?php echo $_POST['mdp']; ?></b> 


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="was-validated">
              <h4 class="text-center display-6 ">Inscription</h4>

              <div class="mb-3 mt-3 ">
                <label for="email" name="email" class="form-label"><h6 class="text-dark">Email:</h6></label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
              </div>

              
              <div class="mb-3 mt-3 ">
              <label for="pseudo" name="pseudo" class="form-label"><h6 class="text-dark">Pseudo:</h6></label>
                <input type="text" class="form-control" id="pseudo" placeholder="Enter pseudo" name="pseudo" required>
                <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              
              <div class="mb-3">
                <label for="mdp" class="form-label"><h6 class="text-dark">Password:</h6> </label>
                <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required>
                <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              
              <div class="form-check mb-3 text-center justify-content-center">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember" required> Remember me
                  <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
                </label>
                
              </div>
              <div class=" container  text-center">
                <button type="submit" class="btn btn-dark   ">Submit</button> <br> <br>
              </div>

              <a style="text-decoration: none;" class=" text-light text-center " href="">
                <h6>Nouveaux, créer un compte maintenant!</h6>
              </a>
            </form>

</body>
</html>