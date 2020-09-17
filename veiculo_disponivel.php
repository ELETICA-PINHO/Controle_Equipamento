<?php 
 include 'conf/conf.php';

$reserva = new Reserva($pdo);
$veiculo = new Veiculo($pdo);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiculos Disponiveis</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/meu.css" rel="stylesheet">
 
</head>
<body>
    <div class="container">
    <h2 class="form-signin">Veiculos Disponiveis</h2> 
        <table class="table table-info">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Veiculo</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Adicionar</th>
                </tr>
            </thead> 
            <tbody>   
                <?php foreach($veiculo->getVeiculosAtivos() as $lista):?>
                <?php if($reserva->verificaDisponibilidade($lista['id'])):?>
                    <tr>
                        <td><?php echo $lista['veiculo'];?></td>
                        <td><?php echo $lista['placa'];?></td>
                        <td><a class="btn btn-lg btn-primary " href="alugar.php?id=<?php echo $lista['id'];?>">Alugar</a></td>
                    </tr>
            </tbody>
                <?php endif;?>
                <?php endforeach;?>    
        </table>
                <a href="index.php" class="btn btn-secondary btn-block ">Voltar Menu</a><br><br>
                <a href="sair.php" class="btn btn-danger btn-block ">Sair</a>
            
            </div>
            
        

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
