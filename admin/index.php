<?php
    session_start();
    if(isset($_SESSION['role'])){
        if($_SESSION['role']!="ROLE_ADMIN"){
            header("LOCATION:403.php");
        }

    }else{
        header("LOCATION:403.php");
    }

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Administration</h1>
    <table border="1">
    <tr>
        <th>id</th>
        <th>login</th>
        <th>role</th>

    </tr>

   
    <?php
    require "../connexion.php";
        $req = $bdd->query("SELECT * FROM members");
        while($don = $req->fetch()){
            echo "<tr>";
                echo "<td>".$don['id']."</td>";
                echo "<td>".$don['login']."</td>";
                echo "<td>".$don['role']."€</td>";
                echo "<td>";
                    echo " <a href='updatemember.php?id=".$don['id']."'>Modifier</a>";
                    echo " <a href='deletemember.php?id=".$don['id']."'>Supprimer</a>";
               echo "</td>";
            echo "</tr>";
        }
        $req->closeCursor();
    ?>
     </table>

</body>
</html>