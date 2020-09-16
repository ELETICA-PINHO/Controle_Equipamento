<?php 
date_default_timezone_set('America/Sao_Paulo');

include "class/class.reserva.php";
include "class/class.veiculo.php";
include "class/class.login.php";
include "class/class.log.php";


try {
    $pdo = new PDO("mysql:dbname=projetoequipamentos;host=localhost;","servidor", "servidor");
} catch (PDOException $erro) {
    echo "Falha".$erro->getMessage();
    exit;
}

?>