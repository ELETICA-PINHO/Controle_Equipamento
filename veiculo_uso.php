<?php 
 include 'conf/conf.php';

$reserva = new Reserva($pdo);
$veiculo = new Veiculo($pdo);


/**
 * --------------------------------------------------
 * ! essa parde do codigo é bem inportante para
 * ! consulta no banco de dados, caso não for passador 
 * !nenhum parametro de data automaticamente o filtro
 * !será feito das 00:00:00 há 23:59:00 do dia atual
 * ? caso sejá preenchido algum dado de filtro será 
 * ? feito conforme dados capturados do formulario
 * ? atráves do POST
 * !houve uma mudança no projeto então o else abaixo não faz mais tando sentido
 * ! agora sistema faz busca por equipamento que não foram dados baixa.    
*/ 
    if(!empty($_POST['dataI']) && !empty($_POST['dataF']) && isset($_POST['filtro'])){
        $dataI = $_POST['dataI'];
        $dataF = $_POST['dataF'];
        $filtro = $_POST['filtro'];
        
    }else{
        $dataI = new DateTime('00:00:00');  
        $dataF = new DateTime('23:59:59');
        $dataI = date_format($dataI, 'Y-m-d H:i:s');
        $dataF = date_format($dataF, 'Y-m-d H:i:s'); 
        $filtro = "-1";
        
    }
   
// ----------------------------------------------------------------
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiculos em uso</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/meu.css" rel="stylesheet">
 
</head>
<body>
    <div class="container">
        <form method="POST" class="form-signin">
        <h2 class="form-signin-heading">Veiculos em uso</h2>
        <div class="form-group">
            <label for="filtro">Filtrar</label>
            <select name="filtro" id="" class="form-control">
                    <option value=""></option>
                    <option value="0">Com Baixa</option>
                    <option value="1">Sem Baixa</option>
                    <option value="2">Todos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dataI">Data Inicial</label>
            <input type="datetime-local" name="dataI" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="dataF">Data Final</label>
            <input type="datetime-local" name="dataF" id="" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Consultar" class="btn btn-success btn-block">
        </div>
        <div class="form-group">
                <a href="index.php" class="btn btn-secondary btn-block ">Voltar Menu</a>
                <a href="sair.php" class="btn btn-danger btn-block ">Sair</a>
        </div>
        
        </form>



        <table class="table table-info">
            <thead class="thead-dark">
                <tr>
                    <th>Operador</th>
                    <th>Data Inicio</th>
                    <th>Data Fim</th>
                    <th>Equipamento</th>
                    <th>Observação Entrada</th>
                    <th>Observação Saida</th>
                    <th>Devolução</th>
                </tr>
            </thead>
            <tbody>   
                <?php foreach($reserva->getReservasAtivas($dataI,$dataF,$filtro) as $lista_r):
                    $data_i = date('H:i:s ---- d-m-Y', strtotime($lista_r['data_inicio']));
                    if(!empty($lista_r['data_fim'])){
                    $data_f = date('H:i:s ---- d-m-Y', strtotime($lista_r['data_fim']));
                    }else{
                        $data_f = "";
                    }
                ?>
                <?php foreach($veiculo->getVeiculoID($lista_r['id_equipamento']) as $lista_v):?>

            <tr>
                <td><?php echo $lista_r['usuarios'];?></td>
                <td><?php echo $data_i;?></td>
                <td><?php echo $data_f;?></td>
                <td><?php echo $lista_v['veiculo'];?></td>
                <?php if(empty($lista_r['data_fim'])):?>
                <td><?php echo $lista_r['observacao_entrada'];?></td>
                <td><?php echo $lista_r['observacao_saida'];?></td>
                <td><a class="btn btn-primary btn-block " href="devolucao.php?id=<?php echo$lista_r['id'];?>">Devolução</a></td>
                <?php else:?>
                <?php endif;?>
            </tr>
            <?php endforeach;?>
            <?php endforeach;?>
        </tbody>   
</table>
    
























                
            
            </div>
            
        

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

