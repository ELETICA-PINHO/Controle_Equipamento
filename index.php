<?php 
session_start();
include 'conf/conf.php';

if(!isset($_SESSION['logado'])){
   header("Location: login.php"); 
   exit;
}

$reserva = new Reserva($pdo);
$veiculo = new Veiculo($pdo);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/signin.css" rel="stylesheet">


</head>
<body>
    <div class="container">
    
        <div class="form-signin">
            <h2 class="form-signin-heading">Tela de Menus</h2>
            <a href="veiculo_uso.php"  class="btn btn-lg btn-info  btn-block">Veiculos em Uso</a><br><br>
            <a href="veiculo_disponivel.php"  class="btn btn-lg btn-info  btn-block">Veiculos Disponivel</a><br><br>
            <a href="cadastro_equipamento.php"  class="btn btn-lg btn-info  btn-block">Cadastro Veiculo</a><br><br>
            <!--<a href="#">Cadastro Operador</a><br><br> -->
            <!-- <a href="#">Veiculos  Manutenção</a><br><br> -->
            <!-- <a href="consulta.php">Consulta </a><br><br> 
            <a href="#">Consulta Operador</a><br><br> -->
            <a href="sair.php"  class="btn btn-lg btn-danger  btn-block">Sair</a><br><br><br><br>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
