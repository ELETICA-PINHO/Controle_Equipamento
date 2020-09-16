<?php 
//session_start();
class Login{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;        
    }


    public function fazerLogin($email,$senha){
        $sql = $this->pdo->prepare("SELECT * FROM usuario_login WHERE email = :email AND senha = :senha AND status = '1' ");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0 ){
            $sql = $sql->fetch();
            $_SESSION['logado'] = $sql['id'];
            return true;
        }else{
            return false;
        }
    }









}



?>