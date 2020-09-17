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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/signin.css" rel="stylesheet">
 
</head>
<body>
    <div class="container">
        <form  method="POST" class="form-signin">
            <h2 class="form-signin-heading">Controle Equipamentos</h2>
            <div class="form-group">
                <label for="email" class="sr-only">E-mail</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="senha" class="sr-only">Senha</label>
                <input type="password" name="senha" id="" class="form-control" placeholder="Senha">
            </div>
            <div class="form-group">
                <input type="submit" value="Entrar" class="btn btn-lg btn-success  btn-block">
            </div>
            <div class="form-group">
                <label  for="resetsenha" class="senha">Esqueceu sua senha?</label>
                <a href="resetsenha.php" class="btn btn-lg btn-primary  btn-block">Clique aqui</a>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>