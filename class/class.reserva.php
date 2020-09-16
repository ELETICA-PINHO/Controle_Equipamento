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

     public function fazerReserva($id_equipamento, $data_inicio, $usuarios, $observacao_entrada){
       
        $sql = $this->pdo->prepare("INSERT INTO reservas (id_equipamento, data_inicio, usuarios, observacao_entrada) VALUES (:id_equipamento, :data_inicio, :usuarios, :observacao_entrada) ");
         
        $sql->bindValue(":id_equipamento",$id_equipamento);
         $sql->bindValue(":data_inicio", $data_inicio);
         $sql->bindValue(":usuarios", $usuarios);
         $sql->bindValue(":observacao_entrada", $observacao_entrada);
         $sql->execute(); 

         if($sql->rowCount() > 0 ){
             return true;
         }else{
             return false;
         }

     }

     public function getReservasAtivas($data_inicio = '',$data_fim = '', $status = ''){
        $array = array();
    
        switch ($status) {
            case '-1':
                $sql = "SELECT * FROM reservas WHERE status = '1'"; // PARA CONSULTAR SOMENTE AS RESERVAS ATIVAS SOMENTE  GERAL SEM FILTROS DE DIA  "SELECT * FROM reservas WHERE status = '1'"; 
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

     public function fazerDevolucao($id, $data_fim, $observacao_saida){

        $sql = $this->pdo->prepare("UPDATE  reservas SET status = '0', data_fim = :data_fim, observacao_saida = :observacao_saida WHERE id = :id ");
        $sql->bindValue(":data_fim", $data_fim);
        $sql->bindValue(":observacao_saida", $observacao_saida);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return true;
        }else{
            return false;
        }

     }

   




 }





?>