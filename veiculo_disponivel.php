<?php 
 include 'conf/conf.php';

$reserva = new Reserva($pdo);
$veiculo = new Veiculo($pdo);

/*
if($reserva->verificaDisponibilidade('3')){
    echo"disponivel";
 }   else{
     echo "em uso";
 }
*/



?>

<table border="1" width="50%">
    <tr>
        <th>Veiculo</th>
        <th>Placa</th>
        <th>Adicionar</th>
    </tr>
    <?php foreach($veiculo->getVeiculosAtivos() as $lista):
        if($reserva->verificaDisponibilidade($lista['id'])):
    ?>
    <tr>
        <td><?php echo $lista['veiculo'];?></td>
        <td><?php echo $lista['placa'];?></td>
        <td><a href="alugar.php?id=<?php echo $lista['id'];?>">Alugar</a></td>
    </tr>

    <?php
endif;    
endforeach; 
        
       ?>
</table><br><br>

<a href="index.php">Voltar Menu</a><br><br>
<a href="sair.php">Sair</a>