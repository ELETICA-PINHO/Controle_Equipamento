<?php 
 include 'conf/conf.php';

$reserva = new Reserva($pdo);


$res =$reserva->verificaDisponibilidade(2);

if($res){
    echo "tru".$res;
}else{
    echo "false".$res;
}


?>

<table border="1" width="50%">
    <tr>
        <th>Nome</th>
        <th>Data Inicio</th>
        <th>Data Fim</th>
        <th>Equipamento</th>
    </tr>
    <?php foreach($reserva->getReservasAtivas() as $lista):
        $data_i = date('H:i:s  d-m-Y', strtotime($lista['data_inicio']));
        ?>
    <tr>
        <td><?php echo $lista['usuarios'];?></td>
        <td><?php echo $data_i;?></td>
        <td><?php echo $lista['data_fim'];?></td>
        <td><?php echo $lista['data_fim'];?></td>

    </tr>
    <?php endforeach;?>
</table>