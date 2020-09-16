<?php 
include "conf/conf.php";

$logs = new Log($pdo);
$logs->registroGetal("acessou pagina trocar senha");



?>

<form action="" method="POST">
<h1>Digite seu CPF ou E-mail para recuperar a senha</h1>

CPF<br>
<input type="number" name="cpf" id=""><br><br>

E-mail<br>
<input type="email" name="emial" id=""><br><br>

<input type="submit" value="Enviar">

</form>

<a href="sair.php">Sair</a>