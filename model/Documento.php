<?php


/**
 * Description of Documento
 *
 * @author danilo
 */
class Documento extends ModeloBase {
    
    private $id_carro;
    private $marca;
    private $numero_chassi;
    private $placa_veiculo;
    
    private $conn;
    private $table_name = "tb_documento";
    
    function __construct($db) {
        $this->conn = $db;
    }

    
    function getId_carro() {
        return $this->id_carro;
    }

    function getMarca() {
        return $this->marca;
    }

    function getNumero_chassi() {
        return $this->numero_chassi;
    }

    function getPlaca_veiculo() {
        return $this->placa_veiculo;
    }

    function setId_carro($id_carro) {
        $this->id_carro = $id_carro;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setNumero_chassi($numero_chassi) {
        $this->numero_chassi = $numero_chassi;
    }

    function setPlaca_veiculo($placa_veiculo) {
        $this->placa_veiculo = $placa_veiculo;
    }
    
    public function insert() {
        
        $query = "INSERT INTO ". $this->table_name . " SET fk_id_carro=:fk_id_carro, marca_veiculo=:marca_veiculo, numero_chassi=:numero_chassi, placa_veiculo=:placa_veiculo";
        
        $stmt = $this->conn->prepare($query);
        
        $this->id_carro = htmlspecialchars(strip_tags($this->id_carro));
        $this->marca_veiculo = htmlspecialchars(strip_tags($this->marca));
        $this->numero_chassi = htmlspecialchars(strip_tags($this->numero_chassi));
        $this->placa_veiculo = htmlspecialchars(strip_tags($this->placa_veiculo));
        
        // bind dos valores
        
        $stmt->bindParam(":fk_id_carro", $this->id_carro);
        $stmt->bindParam(":marca_veiculo",  $this->marca_veiculo);
        $stmt->bindParam(":numero_chassi", $this->numero_chassi);
        $stmt->bindParam(":placa_veiculo", $this->placa_veiculo);  
        
        if ( $stmt->execute() ) {            
            return true;
        } else {
            print_r( $stmt->errorInfo() );
            return false;
        }
        
    }
    
    public function validarCampos() {        
        $this->marca_veiculo = htmlspecialchars(strip_tags($this->marca));
        $this->numero_chassi = htmlspecialchars(strip_tags($this->numero_chassi));
        $this->placa_veiculo = htmlspecialchars(strip_tags($this->placa_veiculo));              
        
        $query = " SELECT * FROM ". $this->table_name . " WHERE marca_veiculo = ? OR numero_chassi = ? OR placa_veiculo = ? ";
        $stmt = $this->conn->prepare($query);        
        $stmt->bindParam("1",  $this->marca_veiculo);
        $stmt->bindParam("2", $this->numero_chassi);
        $stmt->bindParam("3", $this->placa_veiculo);
        
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( ! empty($row) ) {
            return false;
        } else {
            return true;
        }
        
    }
    
    
           
}
