<?php
$db= mysqli_connect("localhost","root","","moduleconnexion");
$requete="SELECT * FROM `utilisateurs` ";
$query=mysqli_query($db,$requete);

$data= mysqli_fetch_all($query);

$erreur=null;


if(!empty($_POST["login"]) && !empty($_POST["password"])) {
    foreach($data as $key=> $value){
        
       if($_POST["login"] === $data[$key][1] && $_POST["password"]=== $data[$key][4]){
        session_start();
        $_SESSION["connected"]=1;
        $_SESSION["login"]= $_POST["login"];
        header("location:index.php");
        }
        else{
            $erreur="Identifiants ou mot de passe incorrects";}
       
    
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