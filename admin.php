<?php
session_start();
require_once "function.php";
if($_SESSION["login"] != "admin"){
    header("location:index.php");
}
$db= mysqli_connect("localhost","root","","moduleconnexion");

$requete="SELECT * FROM `utilisateurs` ";
$requete2 = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME= 'utilisateurs'";


$query=mysqli_query($db, $requete);
$query2=mysqli_query($db, $requete2);
$data_users=mysqli_fetch_all($query);
$column_name= mysqli_fetch_all($query2);

mysqli_close($db);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="src/font/fontello/css/fontello.css">
    <title>Espace administrateur</title>
</head>
<body>
    <header>
    <?php include("header.php");?>

    </header>
    <main class="main_admin">
        
        <div class="main_content">
        <h1>Espace administrateur</h1>
            <table class="table_admin">
                <thead>
                    <tr>
                        <?php
                            for($i=1 ; $i < count($column_name); $i++){
                                for($j=0; $j <count($column_name[$i]); $j++){?>

                            <th><?= $column_name[$i][$j]; ?></th>
                                 
                        <?php } }?>
                        
            </tr>
            </thead>
            <tbody>
            
                <?php for($k=0 ; $k < count($data_users); $k++){?>
                    <tr> 
                     <?php    for($l=1; $l <count($data_users[$k]); $l++){?>

                        <td><?= $data_users[$k][$l]; ?></td>
                            

                      <?php } } ?>
    
                
                     </tr>

            </tbody>
            </table>   
        </div>                     
    </main>
    <footer>
        <?php include("footer.php");?>
    </footer>

    
</body>
</html>