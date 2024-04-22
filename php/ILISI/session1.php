<?php
    session_start();
    $_SESSION["prenom"]="l";
    $_SESSION["age"]=20;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores praesentium expedita natus possimus atque quis totam ad enim aspernatur vero.
    <?php echo 'Bonjour ' .$_SESSION['prenom']. ', tu as ' .$_SESSION['age']. ' ans';
echo $_COOKIE['PHPSESSID'];setcookie("PHPSESSID","",time()-3600);
session_unset();session_destroy();
?>
</body>
</html>