<?php 
 class Reserva{
     private $pdo;

    public function __construct($pdo)
     {
         $this->pdo = $pdo;
     }

     public function verificaDisponibilidade($id){

        $sql = $this->pdo->prepare("SELECT * FROM reservas WHERE id = :id AND status = '1' ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }

     }

     public function reservarVeiculo(){


     }

     public function getReservasAtivas(){
        $array = array();
        $sql = $this->pdo->prepare("SELECT * FROM reservas WHERE status = '1' ");
        $sql->execute();

        if($sql->rowCount() > 0){
            $array =$sql->fetchAll();
            return $array;
        }
        return $array;
     }

     public function getTodasReservas(){

     }

     
     





 }





?>