<?php 
include 'conf/conf.php';

$devolucao = new Reserva($pdo);

if(isset($_GET['id'])){

    $id = $_GET['id'];

    if(isset($_POST['dataF']) && !empty($_POST['observacao'])){
    
        $dataF = $_POST['dataF'];
        $observacao = $_POST['observacao'];

        if($devolucao->fazerDevolucao($id, $dataF, $observacao) == true){
            header("Location: veiculo_uso.php");

        }else{

            echo "Erro ao dar baixa:";
        }
    }

}else{
    header("Location: veiculo_uso.php");
    exit;
}




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolução</title>
</head>
<body>
<h1>Devolução</h1>

<form method="POST">


Data Final:<br>
 <input type="datetime-local" name="dataF" id=""><br><br>


 Observaçõs:<br>
 <textarea name="observacao" id="" cols="25" rows="5"></textarea><br><br>

 <input type="submit" value="enviar">


</form>
<br><br>
    
<a href="index.php">Voltar Menu</a><br><br>
<a href="sair.php">Sair</a>



</body>
</html>