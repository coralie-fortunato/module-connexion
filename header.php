
<h1>Mon Blog</h1>

<?php if(is_connected()):?>
    
<nav>
        <ul>
        <li>Menu</li>
        <li><a href="index.php">Accueil</a></li>
        <?php if(!is_connected()):?>
        <li><a href="connexion.php">Se connecter</a></li>
        <li><a href="inscription.php">S'inscrire</a></li>
        <?php endif; ?>
        <?php if(is_connected()):?>
        <li>Bonjour <?= $_SESSION["login"]?> </li>
        <li><a href="profil.php">Mon profil</a></li>
        <?php if($_SESSION["login"] == "admin"):?>
       
       <li><a href="admin.php">Espace administrateur</a></li>
       
       <?php endif; ?>
        <li><a href="logout.php">Se déconnecter</a></li>
        
        <?php endif; ?>
       

     
        
        
        </ul>
    </nav>
<?php endif; ?>
