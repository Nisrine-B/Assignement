<?php
    $server="localhost";
    $username="root";
    
    try
    {
        $db = new PDO("mysql:host=$server;dbname=ecole",$username,"");

        $nom = $_POST["nom"];
        $filiere= $_POST["filiere"];
        $controle = $_POST["controle"];
        $examen = $_POST["examen"];

        //on ecrit la requete
        $sql = "INSERT INTO etudiant (nom,filiere,controle,examen) VALUES (:n,:f,:c,:e)";
        //on demande à la bdd de preparer la requete
        $stmt = $db->prepare($sql);
        //on met les valeurs pour chaque ?
        $stmt->bindValue('n',$nom,PDO::PARAM_STR);
        $stmt->bindValue('f',$filiere,PDO::PARAM_STR);
        $stmt->bindValue('c',$controle,PDO::PARAM_STR);
        $stmt->bindValue('e',$examen,PDO::PARAM_STR);
        $stmt->execute();
        header("location:base.php");
    }
    catch(PDOException $e)
    {
        echo "Echec de connexion".$e->getMessage();
    }
?>