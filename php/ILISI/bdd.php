<?php

try{
    $bdd= new PDO("mysql:host=localhost;dbname=ilisi24;","root","");
    echo "connexion reussite";
}
catch(PDOException $e)
{
    echo "connexion n'est pas reussite".$e->getMessage();
}

$req = "SELECT * from teste";
$stmt = $bdd->query($req);


// $ligne= $stmt->fetch();
//affiche les deux type de table 
// $ligne= $stmt->fetchall();
$lignes= $stmt->fetchall(PDO::FETCH_ASSOC);
var_dump($lignes);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traiter.php">
        <input type="text" name="nom"><br>
        <input type="text" name="email"><br>
    </form>
    <table border="1"  width="500px">
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>EMAIL</th>
            <th>suppression</th>
            <th>modification</th>
        </tr>
        <?php foreach($lignes as $ligne): ?>
        <tr>
            <td><?php echo $ligne['Id']; ?></td>
            <td><?php echo $ligne['Nom']; ?></td>
            <td><?php echo $ligne['Email']; ?></td>
            <td><a href="supprimer.php?Id=<?php echo $ligne['Id']; ?>">Supprimer</td>
            <td><a href="editer.php?Id=<?php echo $ligne['Id']; ?>">Modifier</td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>






























?>