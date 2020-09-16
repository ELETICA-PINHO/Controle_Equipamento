<?php 

include "conf/conf.php";

$alugar = new Reserva($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['operador']) && !empty($_POST['dataI'])){

        $operador = $_POST['operador'];
        $dataI =    $_POST['dataI'];
        $observacao =    $_POST['observacao'];
        
        if($alugar->fazerReserva($id, $dataI, $operador, $observacao) == true){
            header("location: veiculo_uso.php");   
            exit;
        }else{
            echo "Erros";
        }


    }


}else{
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alugar</title>
</head>
<body>

<form method="POST">

Nome Operador:<br>
<input type="text" name="operador" id=""><br><br>

Data Inicial:<br>
<input type="datetime-local" name="dataI" id=""><br><br>

Observação Entrda:<br>
<textarea name="observacao" id="" cols="25" rows="5"></textarea><br><br>

<input type="submit" value="Alugar">


</form>
<br><br>   


<a href="index.php">Voltar Menu</a><br><br>
<a href="sair.php">Sair</a>

</body>
</html>