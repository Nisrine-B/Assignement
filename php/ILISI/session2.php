<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
echo 'Bonjour ' .$_SESSION['prenom']. ', tu as ' .$_SESSION['age']. ' ans';
echo $_COOKIE['PHPSESSID'];
?>
</body>
</html>
