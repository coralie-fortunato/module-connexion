<?php
$db= mysqli_connect("localhost","root","","moduleconnexion");
$requete="SELECT `login` FROM `utilisateurs` ";
$requete2="SELECT `password` FROM `utilisateurs` ";
$query=mysqli_query($db,$requete);
$query2=mysqli_query($db,$requete2);
$logins=mysqli_fetch_all($query);
$passwords=mysqli_fetch_all($query2);

$erreur=null;

if(!empty($_POST["login"]) && !empty($_POST["password"])) {
    foreach($logins[0] as $key=> $value){
       if($_POST["login"] === $value ){
          foreach($passwords[0] as $keys=>$pwd){
              if($_POST["password"] === $pwd){
                  session_start();
                  header("location:index.php");
              }
              else{
                $erreur="Identifiants ou mot de passe incorrects";}
          }
        }
       else{
           $erreur="Identifiants ou mot de passe incorrects";
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
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Connexion</h1>
    </header>
    <main class="connexion-container">
        <?php if($erreur): ?>
        <div class="error">
          <p><?=  $erreur ?></p>
        </div>
        <?php endif; ?>
        <form action="" method="post" class="form-connexion">
            <label for="login">Login</label>
            <input type="text" id="login" name="login">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name=password>
            <button type="submit" name="connected">Se connecter</button>
        </form>
    </main>
    
</body>
</html>