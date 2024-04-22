<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: base.php");
    exit;
}
include 'connexion.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM comptes WHERE login = :login AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $_SESSION['loggedin'] = true;
        header("location: base.php");
    } else {
        $error = "Login ou mot de passe incorrect";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page d'authentification</title>
</head>
<body>
    <h2>Authentification</h2>
    <form method="post">
        <label>Login:</label><br>
        <input type="text" name="login"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>    <?php  if(isset($error)) echo $error.'<br>';?>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
