<?php

include_once("model/Carro.php");
include_once("model/Documento.php");
include_once("ControllerBase.php");
include_once("conexao/DataSource.php");

/**
 * Controlador Da montadora
 */
class MontadoraController extends ControllerBase {
    
    
    /**
     * Responsável pelo rotiamento da aplicação web e da api rest. 
     */
    public function index() {
        
        if ( isset($_GET['action']) && $_GET['action'] == 'save' ) {                                   
            $this->salvar();          
        } 
        
        if ( $_GET['action'] == 'listaTodos' ) {
            $this->listaTodos();
        }
        
        else {
            
            $this->abreIniciar();        
        }
        
        
    }
    
    /**
     * Responsável por salvar os dados.
     */
    public function salvar() {
        
        $database = new DataSource();
        $db = $database->getConnection();        
        
        $dados_montadora = new Carro( $db );              
        $dados_documento = new Documento( $db );        
       
        $data = json_decode( file_get_contents("php://input") );                                          
        $dados_montadora->setAno_fabricacao($data->ano_carro);
        $dados_montadora->setAno_modelo($data->ano_modelo);
        $dados_montadora->setCor($data->cor);
        $dados_montadora->setOpcionais($data->opcionais);                            
        
        $last_id = $dados_montadora->insert();
        
        // Dados do Documento

        $dados_documento->setId_carro($last_id);
        $dados_documento->setMarca($data->marca);
        $dados_documento->setNumero_chassi($data->numero_chassi);
        $dados_documento->setPlaca_veiculo($data->placa_veiculo);
        $dados_documento->setValor(floatval($data->valor_unitario));
        
        if ( $dados_documento->validarCampos() ) {
            $dados_documento->insert();
            echo(json_encode("Dados inseridos com sucesso"));            
        } else {
            echo(json_encode("Dados tem que ser únicos"));            
        }

        die();                        
    }
    
     public function listaTodos() {     
        
        $database = new DataSource();
        $db = $database->getConnection();                
        $dados_montadora = new Carro( $db );                                      
        $stmt = $dados_montadora->listar();                  
        $dados = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $resultados = json_encode($dados);
        echo $resultados;
        
    }
    
    public function listaDadosMontagem() {
        $database = new DataSource();
        $db = $database->getConnection();                
        $dados_montadora = new Carro( $db );                                      
        $stmt = $dados_montadora->listaMontagem();                  
        $dados = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $resultados = json_encode($dados);
        echo $resultados;
    }

    public function verificaCorVeiculos( ) {        
        $database = new DataSource();
        $db = $database->getConnection();   
        $dados_montadora = new Carro($db);
        $stmt = $dados_montadora->verificaCorVeiculos();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultados = json_encode($dados);
        echo $resultados;
    }

    public function verificaAnoVeiculos() {
        $database = new DataSource();
        $db = $database->getConnection();   
        $dados_montadora = new Carro($db);
        $stmt = $dados_montadora->verificaAnoVeiculos();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultados = json_encode($dados);
        echo $resultados;
    }
    
    
    public function abreIniciar() {
        include 'view/cadastraCarros.php';
    }
    
    
}
