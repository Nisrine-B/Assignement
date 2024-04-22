<?php
    $server="localhost";
    $username = "root";

    try{
        $bd = new PDO("mysql:host=$server;dbname=ecole",$username,"");

        $id = $_GET["idd"];
        $nom = $_POST["nom"];
        $filiere= $_POST["filiere"];
        $controle = $_POST["controle"];
        $examen = $_POST["examen"];

        $sql = 'UPDATE etudiant SET nom=:n, filiere = :f, controle= :c, examen= :e WHERE id =:i';
        $stmt = $bd->prepare($sql);

        $stmt->bindValue('n',$nom,PDO::PARAM_STR);
        $stmt->bindValue('f',$filiere,PDO::PARAM_STR);
        $stmt->bindValue('c',$controle,PDO::PARAM_STR);
        $stmt->bindValue('e',$examen,PDO::PARAM_STR);
        $stmt->bindValue('i',$id,PDO::PARAM_INT);

        $stmt->execute();
        header('location:base.php');
    }
    catch(PDOException $e)
    {
        echo 'connexion failed '.$e->getMessage();
    }
?>
