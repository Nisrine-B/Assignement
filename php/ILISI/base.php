<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body style="align-items : center; text-align: center;">
    <h2>Welcome to the IES DB</h2><br>
    <div style="border : 2px black solid; padding : 10px; display : inline-block;">
    <div style="border : 2px red solid; padding : 10px; display : inline-block;">
    <form method="post">
        Nom : <input type="text" name="nom"><br><br>
        Filiere : <input type="text" name="filiere"><br><br>
        Controle : <input type="text" name="controle"><br><br>
        Examen : <input type="text" name="examen"><br><br>
        <input type="submit" value="Inserer" formaction="inserer.php" style="background-color: red; font-weight: bold;">
        <input type="submit" value="Rechercher" formaction="rechercher.php" style="background-color: red; font-weight: bold;">
        <input type="submit" value="Deconnexion" formaction="deconnexion.php" style="background-color: red; font-weight: bold;">
    </form>
    </div>
    </div>
    <br><br><hr color="black"><hr color="red"><hr color="black"><br><br>
    <?php
    /*//tableau simple
        $server="localhost";
        $username="root";
        
        try
        {
            $db = new PDO("mysql:host=$server;dbname=ecole",$username,"");
            $result = $db->query("SELECT * FROM etudiant");
            $ra = $result->fetchAll(PDO::FETCH_ASSOC);
            
            $n = count($ra);
            echo '<div style="border : 2px black solid; padding : 10px; display : inline-block;">';
            echo'<table border="1px" width="800px" style="border : 2px red solid;margin-left:auto; margin-right: auto;"><tr>';
            foreach($ra[0] as $prop => $val)
            {
                echo '<th>'.strtoupper($prop).'</th>';
            }
            echo '<th>MOYENNE</th>';
            echo '</tr>';
            for( $i = 0; $i<$n; $i++)
            {
                echo '<tr>';
                foreach($ra[$i] as $prop => $val)
                {
                    echo '<td>'.$val.'</td>';
                }
                $moy=(2*$ra[$i]["examen"]+$ra[$i]["controle"])/3;
                echo '<td>'.$moy.'</td>';
                echo '</tr>';
            }
            echo '</table></div>';
        }
        catch(PDOException $e)
        {
            echo "Echec de connexion".$e->getMessage();
        }
    */



    $server="localhost";
    $username="root";
    
    try
    {
        $db = new PDO("mysql:host=$server;dbname=ecole",$username,"");
        $result = $db->query("SELECT * FROM etudiant");
        $ra = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $n = count($ra);
        echo '<div style="border : 2px black solid; padding : 10px; display : inline-block;">';
        echo'<table border="1px" width="800px" style="border : 2px red solid;margin-left:auto; margin-right: auto;"><tr>';
        foreach($ra[0] as $prop => $val)
        {
            echo '<th>'.strtoupper($prop).'</th>';
        }
        echo '<th>MOYENNE</th>';
        echo '</tr>';
        for( $i = 0; $i<$n; $i++)
        {
            echo '<tr>';
            foreach($ra[$i] as $prop => $val)
            {
                echo '<td>'.$val.'</td>';
            }
            $moy=(2*$ra[$i]["examen"]+$ra[$i]["controle"])/3;
            echo '<td>'.$moy.'</td>';
            echo '<td><button onclick="window.location.href= \'modifier.php?idd='.$ra[$i]["id"].'\'" style="background-color: red; font-weight: bold;">Modifier</button></td>';
            echo '<td><button onclick="window.location.href= \'supprimer.php?idd='.$ra[$i]["id"].'\'" style="background-color: red; font-weight: bold;">Supprimer</button></td>';
            echo '</tr>';
        }
        echo '</table></div>';
    }
    catch(PDOException $e)
    {
        echo "Echec de connexion".$e->getMessage();
    }

    ?>
</body>
</html>