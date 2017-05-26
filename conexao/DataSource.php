<?php

/**
 * Description of DataSource
 *
 * @author Jorge Danilo Gomes da Silva
 */
class DataSource {

    private $host = "localhost";
    private $db_name = "SisVendasGo";
    private $user_name = "root";
    private $password = "root";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->user_name, $this->password);
        } catch (PDOException $exception) {
            echo "Erro ao Conectar : " . $exception->getMessage();
        }

        return $this->conn;
    }

}
