<?php 

include "class/class.reserva.php";
include "class/class.veiculo.php";
include "class/class.login.php";
try {
    $pdo = new PDO("mysql:dbname=projetoequipamentos;host=localhost;","servidor", "servidor");
} catch (PDOException $erro) {
    echo "Falha".$erro->getMessage();
    exit;
}

?>