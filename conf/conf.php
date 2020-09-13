<?php 

include "class/class.reserva.php";

try {
    $pdo = new PDO("mysql:dbname=projetoequipamentos;host=localhost;","servidor", "servidor");
} catch (PDOException $erro) {
    echo "Falha".$erro->getMessage();
    exit;
}

?>