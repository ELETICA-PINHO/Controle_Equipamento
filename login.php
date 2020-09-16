<?php 
session_start();
include "conf/conf.php";

$logs = new Log($pdo);
$logar = new Login($pdo);

if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if($logar->fazerLogin($email,$senha)){
        $logs->registroLog("Logado redirecionado para index",$_SESSION['logado']);
        header("Location: index.php");
    }else{
        $logs->registroGetal("Tentativa de login");
        echo "erro";
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<form action="" method="POST">
E-mail<br>
<input type="email" name="email" id=""><br><br>

Senha<br>
<input type="password" name="senha" id=""><br><br>

<input type="submit" value="Entrar"><br><br>
Esqueceu sua senha? 
<a href="resetsenha.php">Clique aqui</a>


</form>
    
</body>
</html>