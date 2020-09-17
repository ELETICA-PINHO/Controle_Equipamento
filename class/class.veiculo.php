<?php 

    class Veiculo{
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
            
        }

        public function getTodosVeiculos(){
            $array = array();
            $sql = $this->pdo->prepare("SELECT * FROM equipamento");
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
                return $array;
            }else{
                return $array;
            }

        }

        public function getVeiculoID($id){
            $array = array();
            $sql = $this->pdo->prepare("SELECT * FROM equipamento WHERE id= :id");
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
                return $array;
            }else{
                return $array;
            }

        }

        public function getVeiculosAtivos(){
            $array = array();

            
            $sql = $this->pdo->prepare("SELECT * FROM equipamento WHERE status_manutencao = '1' OR status_reserva = '1' ");
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
                return $array;
            }else{
                return $array;
            }

        }

        public function cadastrarVeiculo($veiculo,$placa){

            $sql = $this->pdo->prepare("INSERT INTO equipamento SET veiculo = :veiculo, placa = :placa, data_cadastro = now()");
            $sql->bindValue(":veiculo", $veiculo);
            $sql->bindValue(":placa", $placa);
            $sql->execute();

            if($sql->rowCount() > 0 ){
                return true;
            }else{
                return false;
            }

        }


    }





?>