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
*/ 
    if(!empty($_POST['dataI']) && !empty($_POST['dataF']) && isset($_POST['filtro']) ){
        $dataI = $_POST['dataI'];
        $dataF = $_POST['dataF'];
        $filtro = $_POST['filtro'];
        echo $filtro = $_POST['filtro'];
        
    }else{
        $dataI = new DateTime('00:00:00');  
        $dataF = new DateTime('23:59:59');
        $dataI = date_format($dataI, 'Y-m-d H:i:s');
        $dataF = date_format($dataF, 'Y-m-d H:i:s'); 
        $filtro = "-1";
        
    }
   
// ----------------------------------------------------------------
?>



<h1 >Equipamentos em uso</h1>

<form method="POST">

Filtrar
<select name="filtro" id="">
        <option value=""></option>
        <option value="0">Com Baixa</option>
        <option value="1">Sem Baixa</option>
        <option value="2">Todos</option>
        
        
</select><br><br>
   

Data Inicial:<br>
<input type="datetime-local" name="dataI" id=""><br><br>
Data Final:<br>
 <input type="datetime-local" name="dataF" id=""><br><br>

 <input type="submit" value="enviar">

</form>


<table border="1" width="50%">
    <tr>
        <th>Operador</th>
        <th>Data Inicio</th>
        <th>Data Fim</th>
        <th>Equipamento</th>
        <th>Devolução</th>
        <th>Observação</th>
    </tr>

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
        <td><a href="">Devolução</a></td>
        <td></td>
        <?php else:?>
        <td>Com Baixa</td>
        <td><?php echo $lista_r['observacao'];?></td>
        <?php endif;?>
    </tr>
    <?php endforeach;
     endforeach;
     ?>

</table><br><br>

<a href="index.php">Voltar Menu</a><br><br>
<a href="sair.php">Sair</a>

