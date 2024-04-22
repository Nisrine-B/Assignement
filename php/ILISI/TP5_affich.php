<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center;">
    <form action="tp5.php" method="post">
        
    <h1>BASE DE DONNEES ECOLE</h1>
    NOM :       <input type="text" name="nom" id=""><br><br>
    FILIERE :       <input type="text" name="filiere" id=""><br><br>
    CONTROLE :      <input type="text" name="controle" id=""><br><br>
    EXAM :      <input type="text" name="exam" id=""><br><br>
    <button type="submit">Ajouter</button>
    </form>
    <table>
        <?php
            $bd= new PDO("mysql:host=localhost;dbname=ecole","root","");
            $req = "SELECT * FROM etudiant";
            $stmt = $bd->query($req);
            $array = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach()
    </table>
</body>
</html>