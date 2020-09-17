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
</head>
<body>

<form method="POST">


Veiculo:<br>
<input type="text" name="veiculo" id=""><br><br>

Placa:<br>
<input type="text" name="placa" id=""placeholder="AAA-0000" ><br><br>



<input type="submit" value="Cadastrar">
</form>
    
</body>
</html>