<?php 
 include 'conf/conf.php';

$reserva = new Reserva($pdo);
$veiculo = new Veiculo($pdo);


?>

<table border="1" width="50%">
    <tr>
        <th>Nome</th>
        <th>Data Inicio</th>
        <th>Data Fim</th>
        <th>Equipamento</th>
    </tr>
    <?php foreach($reserva->getReservasAtivas() as $lista_r):
        $data_i = date('H:i:s  d-m-Y', strtotime($lista_r['data_inicio']));
        if(!empty($lista_r['data_fim'])){
        $data_f = date('H:i:s  d-m-Y', strtotime($lista_r['data_fim']));
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

    </tr>
    <?php endforeach;
     endforeach; ?>
</table>