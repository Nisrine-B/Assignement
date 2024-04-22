<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body style="align-items : center; text-align: center;">

<br><br><br><br>
<h2>Edit your data</h2>
<div style="border : 2px black solid; padding : 10px; display : inline-block;">
    <div style="border : 2px red solid; padding : 10px; display : inline-block;">
        <?php
            $id=$_GET["idd"];

            $server = "localhost";
            $username = "root";
            try
            {
                $db = new PDO("mysql:host=$server;dbname=ecole",$username,"");
                $sql = "SELECT * FROM etudiant WHERE id = :i";
                $stmt = $db->prepare($sql);
                $stmt->bindValue('i',$id,PDO::PARAM_INT);
        
                $stmt->execute();
                
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $nom = $res[0]["nom"];
                $filiere= $res[0]["filiere"];
                $controle = $res[0]["controle"];
                $examen = $res[0]["examen"];
            
            }
            catch(PDOException $e)
            {
                echo 'connexion echouee'.$e->getMessage();
            }
            
        ?>
        <form method="post">
            Nom : <input type="text" name="nom" value="<?php echo $nom; ?>"><br><br>
            Filiere : <input type="text" name="filiere" value="<?php echo $filiere; ?>"><br><br>
            Controle : <input type="text" name="controle" value="<?php echo $controle; ?>"><br><br>
            Examen : <input type="text" name="examen" value="<?php echo $examen; ?>"><br><br>
            <input type="submit" value="Modifier" formaction="modifier1.php?idd=<?php echo $id; ?>" style="background-color: red; font-weight: bold;">
        </form>
    </div>
</div>
<?php
    
?>
</body>
</html>