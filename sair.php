<?php
session_start();
include "conf/conf.php";

$logs = new Log($pdo);
$logs->registroLog('deslogado do sistema',$_SESSION['logado']);


// destroy session 
session_destroy(
    $_SESSION['logado']

);

//destroy variavel ['logado]  na session
unset(
    $_SESSION['logado']

);

//redireciona para login com variavel logado apagada
header("Location: login.php");
exit;


?>