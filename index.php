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
</head>
<body>

<a href="veiculo_uso.php">Veiculos em Uso</a><br><br>
<a href="veiculo_disponivel.php">Veiculos Disponivel</a><br><br>
<a href="cadastro_equipamento.php">Cadastro Veiculo</a><br><br>
<!--<a href="#">Cadastro Operador</a><br><br> -->
<!-- <a href="#">Veiculos  Manutenção</a><br><br> -->
<!-- <a href="consulta.php">Consulta </a><br><br> 
<a href="#">Consulta Operador</a><br><br> -->
<a href="sair.php">Sair</a><br><br><br><br>
    
</body>
</html>
