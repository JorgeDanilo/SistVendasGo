<?php

include_once("ModeloBase.php");

/**
 * Description of Representante
 *
 * @author Jorge Danilo Gomes da Silva
 */
class Representante extends ModeloBase {
    
    private $id;   
    private $nome;
    
    private $conn;    
    private $table_name = "tb_representates";
    
    /**
     * 
     * @param type $db
     */
    public function __construct( $db ) {    
        $this->conn = $db;
    }
    
    
    /**
     * 
     * @return boolean
     */
    public function insert() {        
        $query = "INSERT INTO " . $this->table_name . " SET nome_representante=:nome_representante";        
        $stmt = $this->conn->prepare($query);                
        $this->nome = htmlspecialchars(strip_tags($this->nome));                
        $stmt->bindParam( ":nome_representante", $this->nome );                
        if ( $stmt->execute() ) {        
            return true;
        } else {            
            return false;
        }        
    }
    
    /**
     * 
     * @return type
     */
    public function listar() {        
        $database = new DataSource();
        $db = $database->getConnection();
        $this->conn = $db;
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_representante DESC";
        $stmt = $this->conn->query($query);
        $stmt->execute();
        return $stmt;
    }     
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    

    
    
}
