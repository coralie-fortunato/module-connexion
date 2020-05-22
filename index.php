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
    <link rel="stylesheet" href="src/font/fontello/css/fontello.css">
</head>
<body>
<header>
    <?php include("header.php");?>

</header>

<main>
<?php if(!is_connected()):?>
    <div class="container">
        <h1 class= "accueil-titre">Bienvenue</h1>
        <div class="sub-container">
            <a href="connexion.php" class="accueil-bouton">Se connecter</a>
            <a href="inscription.php" class="accueil-bouton">S'inscrire</a>
        </div>

    </div>
    <?php endif; ?>
    <?php if(is_connected()):?>
    <div class="main-connected">
        <h1>Site pour apprendre à coder</h1>
        <div class="connected-content">
            <div class="all-article">
                <div class="content-article">
                    <h2>Open Classrooms</h2>
                    <p>OpenClassrooms est un site web de formation en ligne qui propose à ses membres des cours certifiants et des parcours débouchant sur des métiers du numérique</p>
                    <a href="#">En savoir plus</a>
                </div>
                <div class="picture">
                    <img src="src/img/Logo_OpenClassrooms.png" alt="logo">
                </div>
            </div>
            <div class="all-article">
                <div class="content-article">
                    <h2>Codecademy</h2>
                    <p>Codecademy est une plateforme interactive en ligne qui propose d'apprendre gratuitement six langages de programmation, tels que Python, PHP, JavaScript, ou des langages de balisage, comme HTML et CSS2,3 et des tutoriels pour construire des sites web ou améliorer des programmes</p>
                    <a href="https://www.codecademy.com/" target="blank">En savoir plus</a>
                </div>
                <div class="picture">
                    <img src="src/img/academy.png" alt="logo">
                </div>
            </div>
            
        </div>
        <div class="connected-content">
            <div class="all-article">
                <div class="content-article">
                    <h2>Grafikart</h2>
                    <p>Grafikart est un site consacré au développement web et proposant des heures et heures de formations et tutoriels pour apprendre à coder</p>
                    <a href="https://www.grafikart.fr/">En savoir plus</a>
                </div>
                <div class="picture">
                    <img src="src/img/grafikart.jpg" alt="logo">
                </div>
            </div>
            <div class="all-article">
                <div class="content-article">
                    <h2>CodinGame</h2>
                    <p>CodinGame est un site consacré à la programmation informatique ludique, proposant d’un côté des casse-têtes de difficulté croissante à résoudre dans l’un des vingt-cinq langages de programmation ...</p>
                    <a href="https://www.codingame.com/home">En savoir plus</a>
                </div>
                <div class="picture">
                    <img src="src/img/codingame.png" alt="logo">
                </div>
            </div>
            
        </div>
    </div>
    <?php endif; ?>
</main>
<footer>
    <?php include("footer.php");?>

</footer>

    
</body>
</html>