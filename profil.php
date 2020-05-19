<?php

require_once 'function.php';
if(!is_connected()){
    header("Location:connexion.php");
    exit();
}


if(isset($_SESSION["login"])){
    $db= mysqli_connect("localhost","root","","moduleconnexion");
    $requete= "SELECT * FROM `utilisateurs` WHERE login='".$_SESSION["login"]."'" ;
    $query=mysqli_query($db, $requete);
    $data=mysqli_fetch_assoc($query);

  
}  
$message=null;
$wrongpwd=null;
if(isset($_POST["modifier"]) ){
    $login= $_POST["login"];
    $prenom= $_POST["prenom"];
    $nom= $_POST["nom"];
    $password= $_POST["password"];
    $password_repeat=$_POST["confirm-pwd"];
    $req_update= "UPDATE `utilisateurs` SET `login`='$login',
    `prenom`='$prenom',`nom`='$nom',`password`='$password' WHERE login='".$_SESSION["login"]."'";

    if($password=$password_repeat){
        if($data["nom"] != $nom){
        
            mysqli_query($db, $req_update);

            header("location:profil.php");
            $message="Votre profil a été mis à jour avec succès";

        }
        if($data["prenom"] != $prenom){
        
            mysqli_query($db, $req_update);

            header("location:profil.php");
            $message="Votre profil a été mis à jour avec succès";
        }
        
        if($data["login"] != $login){

            mysqli_query($db, $req_update);

            header("location:profil.php");
            $message="Votre profil a été mis à jour avec succès";
        }
        if($data["password"] != $password){
        
            mysqli_query($db, $req_update);

            header("location:profil.php");
            $message="Votre profil a été mis à jour avec succès";

        }
    } 
    else{
        $wrongpwd="Mot de passe différent" ;
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
        <h1>Modifier mon profil</h1>
    </header>
    <main>
       <div class="inscription_container">
            <?php if($wrongpwd): ?>
                <div class="error">
                    <?= $wrongpwd ?>
                </div>
            <?php endif; ?>
            <?php if($message): ?>
                <div class="error">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            
            <form action="" method="post" id="inscription">
                <?php
            
                ?>
                <label for="nom">Votre nom</label>
                <input id="nom" name="nom" type="text" value = <?php echo $data["nom"]; ?> required>
                <label for="prenom">Votre prénom</label>
                <input id="prenom" name="prenom" type="text" value = <?php echo $data["prenom"]; ?> required>
                <label for="login">Votre login</label>
                <input id="login" name="login" type="text" value = <?php echo $data["login"]; ?> required>
                <label for= "password">Mot de passe</label>
                <input id="password" name="password" type="password" value = <?php echo $data["password"]; ?>>
                <label for= "confirm-pwd">Confirmation de Mot de passe</label>
                <input id="confirm-pwd" name="confirm-pwd" type="password" >
                <button type="submit" name="modifier">Valider les modifications</button>

            </form>
        </div>

    </main>

    
</body>
</html>