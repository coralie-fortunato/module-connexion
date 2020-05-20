<?php
session_start();
$db= mysqli_connect("localhost","root","","moduleconnexion");
require_once "function.php"

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php if(!is_connected()):?>
    <nav>
        <ul>
        <li>Menu</li>
        <li><a href="connexion.php">Se connecter</a></li>
        <li><a href="inscription.php">S'inscrire</a></li>
        
        
        </ul>
    </nav>
<?php endif; ?>
    <?php if(is_connected()):?>
        <nav>
            <ul>
            <li>Menu</li>
            <li>Bonjour <?= $_SESSION["login"]?> </li>
            <li><a href="profil.php">Mon profil</a></li>
            <li><a href="logout.php">Se déconnecter</a></li>
            
            </ul>
        </nav>
        <?php endif; ?>

   



</header>
<main class="accueil">
    <div class="container">
        <h1 class= "accueil-titre">Bienvenue</h1>
        <div class="sub-container">
            <a href="connexion.php" class="accueil-bouton">Se connecter</a>
            <a href="inscription.php" class="accueil-bouton">S'inscrire</a>
        </div>

    </div>
</main>
<footer>


</footer>

    
</body>
</html>