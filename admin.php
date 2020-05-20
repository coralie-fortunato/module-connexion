<?php
session_start();
if($_SESSION["connected"] != 0){
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Espace administrateur</title>
</head>
<body>
    <header>

    </header>
    <main class="main_admin">
        <h1>Espace administrateur</h1>
        <div class="main_content">
            <table class="table_admin">
                <thead>
                    <tr>
                        <?php
                            for($i=1 ; $i < count($column_name); $i++){
                                for($j=0; $j <count($column_name[$i]); $j++){?>

                            <th><?= $column_name[$i][$j]; ?></th>
                                 
                        <?php } }?>
                        <th>Supprimer profil</th>  
            </tr>
            </thead>
            <tbody>
                <?php
                                for($k=0 ; $k < count($data_users); $k++){?>
                                    <tr> 
                                <?php    for($l=1; $l <count($data_users[$k]); $l++){?>

                            <td><?= $data_users[$k][$l]; ?></td>

                            <?php } }?>
                            
                            </tr>

            </tbody>
            </table>   
        </div>                     
    </main>

    
</body>
</html>