<?php 
 class Reserva{
     private $pdo;

    public function __construct($pdo)
     {
         $this->pdo = $pdo;
     }

     public function verificaDisponibilidade($id){

        $sql = $this->pdo->prepare("SELECT * FROM reservas WHERE id_equipamento = :id AND status = '1' ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }else{
            return true;
        }

     }

     public function reservarVeiculo(){


     }

     public function getReservasAtivas($data_inicio = '',$data_fim = '', $status = ''){
        $array = array();
    
        switch ($status) {
            case '-1':
                $sql = "SELECT * FROM reservas WHERE status = '1'";
                break;
            case '0':
                $sql = "SELECT * FROM reservas WHERE status = '0' AND data_inicio BETWEEN '$data_inicio' AND '$data_fim' or  data_fim  BETWEEN '$data_inicio' AND '$data_fim' ";
                break;

            case '1':
                $sql = "SELECT * FROM reservas WHERE status = '1' AND data_inicio BETWEEN '$data_inicio' AND '$data_fim' ";
                break;

            case '2':
                $sql = "SELECT * FROM reservas  WHERE data_inicio BETWEEN '$data_inicio' AND '$data_fim'";
                break;
        }
        $sql= $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array =$sql->fetchAll();
            return $array;
        }else{
            return $array;
        }
        
     }

     public function getReservasDisponiveis(){
        $array = array();
        $sql = $this->pdo->prepare("SELECT * FROM reservas WHERE status = '0' ");
        $sql->execute();

        if($sql->rowCount() > 0){
            $array =$sql->fetchAll();
            return $array;
        }else{
            return $array;
        }
        
     }

   




 }





?>