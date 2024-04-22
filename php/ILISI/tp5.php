<?php 
$bdd = new PDO("mysql:host=localhost;dbname=ecole","root" , "");
$nom=$_POST["nom"];
$filiere=$_POST["filiere"];
$controle=$_POST["controle"];
$exam=$_POST["exam"];
$req= "INSERT INTO etudiant(nom,filiere,controle,examen) VALUES(?,?,?,?)";
$stmt = $bdd->prepare($req);// préparer la requête
// Mettre les valeurs pour chaque point d’interroggation
$stmt->bindValue(1,$nom, PDO::PARAM_STR);
$stmt->bindValue(2,$filiere, PDO::PARAM_STR);
$stmt->bindValue(3,$controle, PDO::PARAM_STR);
$stmt->bindValue(4,$exam, PDO::PARAM_STR);
$stmt->execute();
header('location:TP5_affich.php');
?>