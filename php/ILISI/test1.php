<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement.php" method="post" enctype="multipart/form-data">
    Entrez votre prénom : <input type="text" name="prenom" /><br><br>
	Indiquez le jour de la semaine :<select name="jour_sem">
<option value=" Dimanche ">Dimanche
<option value=" Lundi ">Lundi
<option value=" Mardi ">Mardi
<option value=" Mercredi ">Mercredi
<option value=" Jeudi ">Jeudi
<option value=" Vendredi ">Vendredi
<option value=" Samedi ">Samedi
</select>
<br><br>
Quelle tranche d'âge avez-vous ? <br>
<input type=radio name=age value="Moins de 18 ans" checked>Moins de 18 ans<br>
<input type=radio name=age value="entre 19 et 25 ans">entre 19 et 25 ans<br>
<input type=radio name=age value="Plus que 26 ans">Plus que 26 ans<br><br>

Choisir les cours qui vous intéresse : <br>
<input type=checkbox name=cours[] value=HTML> HTML
<input type=checkbox name=cours[] value=Javascript> Javascript
<input type=checkbox name=cours[] value=PHP> PHP
<input type=checkbox name=cours[] value=Java> Java
<input type=checkbox name=cours[] value=AJAX> AJAX<br><br>

<input type="file" name="photo[]"> <br>
 <input type="file" name="photo[]"> <br>
 <br><br>

<input type=submit value="valider">
<input type=reset value=Annuler>


    </form>
</body>
</html>