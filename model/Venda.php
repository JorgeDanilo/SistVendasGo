<?php

include_once("ModeloBase.php");

class Venda extends ModeloBase {

	private $id;
	private $id_representante;
	private $id_documento;
	private $dataVenda;
	private $valorTotal;
        
        private $conn;
        private $table_name = "tb_vendas";
        
        function __construct($db) {
            $this->conn = $db;
        }
        
        public function insert() {            
            
            $query = "INSERT INTO " . $this->table_name . " SET fk_tb_documento=:fk_tb_documento, data_venda=:data_venda, fk_id_representantes=:fk_id_representantes, valor_total=:valor_total";

            $stmt = $this->conn->prepare($query);
            
            $this->id_documento = htmlspecialchars(strip_tags($this->id_documento));
            $this->dataVenda = htmlspecialchars(strip_tags($this->dataVenda));
            $this->id_representante = htmlspecialchars(strip_tags($this->id_representante));
            $this->valorTotal = htmlspecialchars(strip_tags($this->valorTotal));        
            
            // bind dos valores
            $stmt->bindParam( ":fk_tb_documento", $this->id_documento );
            $stmt->bindParam( ":data_venda", $this->dataVenda );
            $stmt->bindParam( ":fk_id_representantes", $this->id_representante );
            $stmt->bindParam( ":valor_total", $this->valorTotal );
            
            if ( $stmt->execute() ) {
                return true;
            } else {
                echo "<pre>";
                    print_r($stmt->errorInfo());
                echo "</pre>";   
                return false;
            }
        }
                
        
        function getId() {
            return $this->id;
        }

        function getId_representante() {
            return $this->id_representante;
        }

        function getId_documento() {
            return $this->id_documento;
        }

        function getDataVenda() {
            return $this->dataVenda;
        }

        function getValorTotal() {
            return $this->valorTotal;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setId_representante($id_representante) {
            $this->id_representante = $id_representante;
        }

        function setId_documento($id_documento) {
            $this->id_documento = $id_documento;
        }

        function setDataVenda($dataVenda) {
            $this->dataVenda = $dataVenda;
        }

        function setValorTotal($valorTotal) {
            $this->valorTotal = $valorTotal;
        }



	
}