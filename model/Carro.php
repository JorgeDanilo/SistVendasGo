<?php

include_once("ModeloBase.php");


/**
 * Classe Modelo Carro
 *
 * @author Jorge Danilo Gomes da Silva
 */
class Carro extends ModeloBase {
    
    private $id;
    private $ano_fabricacao;
    private $ano_modelo;
    private $cor;
    private $opcionais;
    
    private $conn;
    private $table_name = "tb_carro";
    
    public function __construct($db) {
        $this->conn = $db;       
    } 
    
    function getId() {
        return $this->id;
    }

    function getAno_fabricacao() {
        return $this->ano_fabricacao;
    }

    function getAno_modelo() {
        return $this->ano_modelo;
    }

    function getCor() {
        return $this->cor;
    }

    function getOpcionais() {
        return $this->opcionais;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAno_fabricacao($ano_fabricacao) {
        $this->ano_fabricacao = $ano_fabricacao;
    }

    function setAno_modelo($ano_modelo) {
        $this->ano_modelo = $ano_modelo;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setOpcionais($opcionais) {
        $this->opcionais = $opcionais;
    }

    
    /**
     * Responsável por inserir no banco de dados.
     * @return boolean
     */
    public function insert() {        
       
        $query = "INSERT INTO ". $this->table_name . " SET ano_fabricacao=:ano_fabricacao, ano_modelo=:ano_modelo, cor=:cor, opcionais=:opcionais";        
        $stmt = $this->conn->prepare( $query );
        
        $this->ano_fabricacao = htmlspecialchars(strip_tags($this->ano_fabricacao));
        $this->ano_modelo = htmlspecialchars(strip_tags($this->ano_modelo));
        $this->cor = htmlspecialchars(strip_tags($this->cor));
        $this->opcionais = htmlspecialchars(strip_tags($this->opcionais));
        
        // bind dos valores        
        $stmt->bindParam( ":ano_fabricacao", $this->ano_fabricacao );
        $stmt->bindParam( ":ano_modelo",  $this->ano_modelo );
        $stmt->bindParam( ":cor", $this->cor );
        $stmt->bindParam( ":opcionais", $this->opcionais );                
        
        if ( $stmt->execute() ) {
            $last_id = $this->conn->lastInsertId();            
            return $last_id;
        } else {
            return false;
        }        
    }
    
    /**
     * Responsável por listar os dados
     * @return type
     */
    public function listar() {
       $database = new DataSource();
       $db = $database->getConnection();
       $this->conn = $db;
       $query = " SELECT * FROM tb_carro ORDER BY id_carro DESC ";
       $stmt = $this->conn->query($query);
       $stmt->execute();  
       return $stmt;                          
       
    }
    
    public function listaMontagem() {
       $database = new DataSource();
       $db = $database->getConnection();
       $this->conn = $db;
       $query = " SELECT * FROM  tb_carro as carro INNER JOIN tb_documento as documento ON documento.fk_id_carro = id_carro;  ";
       $stmt = $this->conn->query($query);
       $stmt->execute();  
       return $stmt;                          
    }
      
    

    
}
