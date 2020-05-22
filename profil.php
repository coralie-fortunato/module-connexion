<?php
session_start();
require_once 'function.php';
if(!is_connected()){
    header("Location:connexion.php");
    exit();
}
$db= mysqli_connect("localhost","root","","moduleconnexion");


if(isset($_SESSION["login"])){

    $requete= "SELECT * FROM `utilisateurs` WHERE login='".$_SESSION["login"]."'" ;
    $query=mysqli_query($db, $requete);
    $data=mysqli_fetch_assoc($query);
    
  
}  

$wrongpwd=null;

if(isset($_POST["modifier"]) ){
    $login= $_POST["login"];
    $prenom= $_POST["prenom"];
    $nom= $_POST["nom"];
    $password= $_POST["password"];
    $password_repeat=$_POST["confirm-pwd"];
    $req_update= "UPDATE `utilisateurs` SET`login`='$login', `prenom`='$prenom',`nom`='$nom',`password`='$password' WHERE login='".$_SESSION["login"]."'";
   
    if($password=$password_repeat){
       
         if($data["login"] != $login){
            mysqli_query($db, $req_update);
            $_SESSION["login"]=$login;
            header("location:profil.php");
        }
                    
        if($data["nom"] != $nom || $data["prenom"] != $prenom  ||  $data["password"] != $password ){
            
            mysqli_query($db, $req_update);
            header("location:profil.php");

        }
      
     
        
    } 
    else{
        $wrongpwd="Mot de passe différent" ;
    } 
  
   
    
}
   
mysqli_close($db);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="src/font/fontello/css/fontello.css">
    <title>Profil</title>
</head>
<body>
    <header>
        <?php include("header.php");?>
        
    </header>
    <main>
    <h1>Modifier mon profil</h1>
       <div class="inscription_container">
            <?php if($wrongpwd): ?>
                <div class="error">
                    <?php echo $wrongpwd ?>
                </div>
            <?php endif; ?>
            <?php if($message): ?>
                <div class="error">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            <?php if(isset($message_login)): ?>
                <div class="error">
                    <?php echo $message_login ?>
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
    <footer>
        <?php include("footer.php");?>
    </footer>

    
</body>
</html>