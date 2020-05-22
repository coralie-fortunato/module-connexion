<h1>Mon Blog</h1>
<?php if(is_connected()):?>
<div class="head">

<p class="hello-user">Bonjour <?= $_SESSION["login"]?> </p>
</div>
<?php endif; ?>

<?php if(is_connected()):?>
    
<nav>
        <ul>
        <li>Menu</li>
        <li class="nav-link"><a href="index.php">Accueil</a></li>
        <?php if(!is_connected()):?>
        <li class="nav-link"><a href="connexion.php">Se connecter</a></li>
        <li class="nav-link"><a href="inscription.php">S'inscrire</a></li>
        <?php endif; ?>
        <?php if(is_connected()):?>
        
        <li class="nav-link"><a href="profil.php">Mon profil</a></li>
        <?php if($_SESSION["login"] == "admin"):?>
       
       <li class="nav-link"><a href="admin.php">Espace administrateur</a></li>
       
       <?php endif; ?>
        <li class="nav-link"><a href="logout.php">Se déconnecter</a></li>
        
        <?php endif; ?>
       

     
        
        
        </ul>
    </nav>
<?php endif; ?>
