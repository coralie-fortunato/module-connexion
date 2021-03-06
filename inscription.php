<?php
session_start();
require_once 'function.php';
$db= mysqli_connect("localhost","root","","moduleconnexion");

$wrongpwd=null;
$message=null;


if(isset($_POST["connected"])){
    $login= $_POST["login"];
    $prenom= $_POST["prenom"];
    $nom= $_POST["nom"];
    $password= $_POST["password"];
    $password_repeat=$_POST["confirm-pwd"];

    if(!empty($login) && !empty($prenom) && !empty($nom) && !empty($password) && !empty($password_repeat)){
        $requete2="SELECT * FROM `utilisateurs` WHERE login='$login'";
        $query2=mysqli_query($db, $requete2);
        $data=mysqli_fetch_all($query2);
            if(count($data) == 0){
                if($password === $password_repeat){
                    $requete= "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$password')";
                    $query= mysqli_query($db, $requete);
                    header("location:connexion.php");
                }
                else{
                $wrongpwd="Mot de passe différent" ;
                }

            }
            elseif(count($data)==1){
                $message="Login déjà utilisé";
            }
        
        
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
    <title>Inscription</title>
</head>
<body>
    <header>
    <?php include("header.php");?>
    </header>
    <main>
    <h1>Inscription</h1>
        <div class="inscription_container">
            <?php if($wrongpwd): ?>
                <div class="error">
                    <?php echo $wrongpwd ?>
                </div>
            <?php endif; ?>
            <?php if($message): ?>
                <div class="error">
                    <?php echo $message ?>
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
    <footer>
    <?php include("footer.php");?>
    </footer>

    
</body>
</html>