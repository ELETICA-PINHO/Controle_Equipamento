<?php  
class Log{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function registroLog($acao, $id_usuario){
        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = $this->pdo->prepare("INSERT INTO logs (acao, id_usuario, ip) VALUES (:acao, :id_usuario, :ip) ");
        $sql->bindValue(":acao", $acao);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":ip", $ip);
        $sql->execute();
    }

    public function registroGetal($acao){
        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = $this->pdo->prepare("INSERT INTO logs set acao = :acao, ip = :ip");
        $sql->bindValue(":acao", $acao);
        $sql->bindValue(":ip", $ip);
        $sql->execute();
    }




}




?>