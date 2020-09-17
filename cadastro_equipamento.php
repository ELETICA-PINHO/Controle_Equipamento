<?php
session_start();
include 'conf/conf.php';

$cadastrar = new Veiculo($pdo);



if(isset($_POST['veiculo'])  && !empty($_POST['placa'])){

    $veiculo = $_POST['veiculo'];
    $placa =  $_POST['placa'];

    if($cadastrar->cadastrarVeiculo($veiculo, $placa) == true){
        header("Location: index.php");
        exit;
    }else{
        echo "Erro";
    }

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Veiculos</title>   
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/signin.css" rel="stylesheet">
</head>
<body>
<form method="POST" class="form-signin">
    <h2 class="form-signin-heading">Cadastro de veiculos</h2>
    <div class="form-group">
        <input type="text" name="veiculo" id="" placeholder="Veiculo" class="form-control">    
    </div>
    <div class="form-group">
        <input type="text" name="placa" id=""placeholder="AAA-0000" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit"  class="btn btn-lg btn-info  btn-block" value="Cadastrar">
    </div>
    <div class="form-group">
        <a href="index.php" class="btn btn-lg btn-secondary  btn-block">Voltar</a> 
    </div>
</form>
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>