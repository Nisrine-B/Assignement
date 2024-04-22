<?php
echo "Prénom tapé par l'utilisateur : ".$_POST['prenom'];
$jour=$_POST["jour_sem"];
echo "<br>Nous sommes le $jour";
$vage=$_POST["age"];
?>
<br>
Votre tranche d'âge est :
<?php
echo $vage;
print_r($_POST["cours"]);
echo '<br>';
if(isset($_POST["cours"]))
{
	$cours= $_POST["cours"];
	$n=count($cours);
	echo '<table border="1px" width="150px"> <tr> <th>Cours</th></tr>';
	for( $i=0; $i<$n; $i++)
	{
		echo "<tr><td><center>".$cours[$i]."</center></td></tr>";
	}
	echo "</table>";
}
else
	echo "aucun cours n'est selectionne";
echo '<br>';
print_r($_FILES);

if(isset($_FILES))
{
	$fich= $_FILES["photo"];
	$n=count($fich); 	//number of properties of the files
	$m=count($fich["name"]); //number of files under the same name
	$l=count($_FILES); 	//number of files (by name) in the var $_FILES
	
	foreach($_FILES as $x=>$y)
	{
		echo "<br><br>This is $x <br>";
		echo '<table border="1px" width="80%"> <tr>';

		//printing the 1st line of properties names
		foreach( $y as $z=>$t){
			echo "<th>".strtoupper($z)."</th>";
		}
		echo "</tr>";
		$e=count($y);
		$f=count($y["name"]);
		//printing the content of the properties for each file
		for( $i=0; $i<$f; $i++)
		{
			echo "<tr>";
			foreach( $y as $z=>$t){
				echo "<td><center>".$t[$i]."</center></td>";
			}
			//echo "<td><center>".$fich["full_path"][$i]."</center></td>";
			//echo "<td><center>".$fich["size"][$i]."</center></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
else
	echo "aucun fichier n'est choisi";


echo"<br> <a href='test1.php'>retour</a>";
?>