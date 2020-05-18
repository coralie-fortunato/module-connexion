<?php
session_start();
$db= mysqli_connect("localhost","root","","moduleconnexion");
$wrongpwd=null;

if(isset($_POST["connected"])){
    $login= $_POST["login"];
    $prenom= $_POST["prenom"];
    $nom= $_POST["nom"];
    $password= $_POST["password"];
    $password_repeat=$_POST["confirm-pwd"];

    if(!empty($login) && !empty($prenom) && !empty($nom) && !empty($password) && !empty($password_repeat)){
      
        if($password === $password_repeat){
            $requete= "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$password')";
            $query= mysqli_query($db, $requete);
            header("location:connexion.php");
        }
        else{
           $wrongpwd="Mot de passe différent" ;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <header>
        <h1>Inscription</h1>
    </header>
    <main>
        <div class="inscription_container">
            <?php if($wrongpwd): ?>
                <div class="error">
                    <?= $wrongpwd ?>
                </div>
            <?php endif; ?>
            
            <form action="" method="post" id="inscription">
                <label for="nom">Votre nom</label>
                <input id="nom" name="nom" type="text" required>
                <label for="prenom">Votre prénom</label>
                <input id="prenom" name="prenom" type="text" required>
                <label for="login">Votre login</label>
                <input id="login" name="login" type="text" required>
                <label for= "password">Mot de passe</label>
                <input id="password" name="password" type="password" required>
                <label for= "confirm-pwd">Confirmation de Mot de passe</label>
                <input id="confirm-pwd" name="confirm-pwd" type="password" required>
                <button type="submit" name="connected">Valider</button>

            </form>
        </div>

    </main>

    
</body>
</html>