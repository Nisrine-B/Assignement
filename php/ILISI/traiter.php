<?php

$n=$_POST['nom'];
$e=$_POST['email'];


$bdd= new PDO("mysql:host=localhost;dbname=ilisi24;","root","");

// $req="insert into teste(Nom,Email) values('$n','$e')";
// $bdd->exec($req);

$req = "INSERT INTO teste(Nom,Email) values (:n,:e)";

$stmt=$bdd->prepare($req);
$ stmt->bindValue(1,$n, PDO::PARAM_STR);
$stmt->bindValue(2,$e, PDO::PARAM_STR);
$stmt->execute();
header("location:bdd.php");
?>