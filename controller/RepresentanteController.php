<?php

include_once("model/Representante.php");
include_once("ControllerBase.php");
include_once("conexao/DataSource.php");
include_once("MontadoraController.php");

/**
 * Classe controladora dos fluxos relacionados ao representantes.
 *
 * @author Jorge Danilo Gomes da Silva
 */
class RepresentanteController extends ControllerBase {
    
    public function index() {        
        if ( isset($_GET['action']) && $_GET['action'] == 'save' ) {        
            $this->salvar();            
            die();
        }   
        
        if ( isset($_GET['action']) && $_GET['action'] == 'listaRepresentantes' ) {           
            $this->listaTodos();            
            die();
        }
        
        if ( isset($_GET['action']) && $_GET['action'] == 'listaMontagem' ) {            
            $this->listaDadosMontagem();            
            die();
        }          
        
        if ( isset($_GET['action']) && $_GET['action'] == 'getRepresentante' ) {
            $this->getRepresentante();
            die();
        }
        
        else {        
            include 'view/representante.php';
        }        
    }
    
    /**
     * Responsável por salvar os dados na base de dados.
     */
    public function salvar() {        
        $database = new DataSource();        
        $db = $database->getConnection();                  
        $representante = new Representante( $db );        
        $data = json_decode( file_get_contents("php://input") );                                                  
        $representante->setNome($data->nome);        
        if ( $representante->insert() ) {        
            echo(json_encode("Dados inseridos com sucesso"));            
        }
    }
    
    
    /**
     * 
     */
    public function listaTodos() {        
        $database = new DataSource();
        $db = $database->getConnection();
        $representantes = new Representante( $db );
        $stmt = $representantes->listar();
        $dados = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $resultados = json_encode($dados);
        echo $resultados;
        
    }
    
    /**
     * 
     */
    public function listaDadosMontagem() {
        $dados_montagem = new MontadoraController();
        $resultados = $dados_montagem->listaDadosMontagem();        
        echo $resultados;
    }       
    
}
