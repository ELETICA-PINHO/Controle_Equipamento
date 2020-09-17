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
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alugar</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/signin.css" rel="stylesheet">

</head>
<body>
    <div class="container">
    <form method="POST" class="form-signin">
        <h2 class="form-signin-heading">Devolução</h2>
        <div class="form-group">
            <label for="dataI" >Data Final</label>
            <input type="datetime-local" name="dataF" id="" class="form-control" >
        </div>
        <div class="form-group">
            <label for="observacao" >Observaçãoes</label>
            <textarea name="observacao" id="" cols="25" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Devolver" class="btn btn-lg btn-success  btn-block">
        </div>
        <div class="form-group">
            <a href="index.php"class="btn btn-lg btn-secondary  btn-block">Voltar Menu</a>
            <a href="sair.php"class="btn btn-lg btn-danger  btn-block">Sair</a>
        </div>
       
    </form>

    </div>
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
