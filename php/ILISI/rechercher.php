<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body style="align-items : center; text-align: center;">

<br><br><br><br>

<?php
    $server = "localhost";
    $username = "root";

    try
    {
        $db = new PDO("mysql:host=$server;dbname=ecole",$username,"");

        $filiere= $_POST["filiere"];

        $sql = "SELECT * FROM etudiant WHERE filiere = :f";
        $stmt = $db->prepare($sql);
        $stmt->bindValue('f',$filiere,PDO::PARAM_STR);

        $stmt->execute();
        
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $n = count($res);

        if($n == 0) echo 'No result found<br><br><br>';
        else
        {
            echo '<h2>Resultat Recherche : '.$filiere.'</h2> <br><br>';
            echo '<div style="border : 2px black solid; padding : 10px; display : inline-block;">';
            echo'<table border="1px" width="800px" style="border : 2px red solid;margin-left:auto; margin-right: auto;"><tr>';
            //the first row 
            foreach($res[0] as $prop => $val)
            {
                echo '<th>'.strtoupper($prop).'</th>';
            }
            echo '<td>MOYENNE</td></tr>';
    
            //the rest of the rows
            for($i=0 ; $i<$n ; $i++)
            {
                echo '<tr>';
                foreach($res[$i] as $prop => $val)
                {
                    echo '<td>'.$val.'</td>';
                }
                $moy = (2*$res[$i]["examen"]+ $res[$i]["controle"])/3;
                echo '<td>'.$moy.'</td></tr>';
            }
            echo '</table></div><br><br><br>';
    
        }
        echo '<button onclick="window.location.href = \'base.php\'" style="background-color: red; font-weight: bold;">  Home  </button>';
    }
    catch(PDOException $e)
    {
        echo 'Connexion failed'.$e->getMessage();
    }
?>
</body>
</html>