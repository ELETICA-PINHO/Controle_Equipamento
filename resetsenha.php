<?php 
include "conf/conf.php";

$logs = new Log($pdo);
$logs->registroGetal("acessou pagina trocar senha");



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
            <h2 class="form-signin-heading">Digite CPF ou E-mail</h2>
            <div class="form-group">
                <input type="number" name="cpf" id="" class="form-control" placeholder="CPF">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-lg btn-success  btn-block">
            </div>
            <div class="form-group">
                <a href="sair.php" class="btn btn-lg btn-danger  btn-block">Sair</a> 
            </div>
        </form>
    </div>

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>