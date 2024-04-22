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

        $id = $_GET["idd"];
        if(isset($id))
        {
            $sql = "DELETE FROM etudiant WHERE id = :i";
            $stmt = $db->prepare($sql);
            $stmt->bindValue('i',$id,PDO::PARAM_INT);

            $stmt->execute();
            header('location:base.php');
        }
        
    }
    catch(PDOException $e)
    {
        echo 'Connexion failed'.$e->getMessage();
    }
?>
</body>
</html>