<?php

include_once("ControllerBase.php");
include_once("model/Venda.php");
include_once("conexao/DataSource.php");
include_once("MontadoraController.php");

/**
 * Controlador das Vendas.
 *
 * @author Jorge Danilo Gomes da Silva
 */
class VendasController extends ControllerBase {
    
    public function index() {
        if ( isset($_GET['action']) && $_GET['action'] == 'save' ) {                                   
            $this->salvar();          
            die();
        }

        if ( isset($_GET['action']) && $_GET['action'] == 'buscarDadosMontagem' ) {
            $this->buscarDadosMontagem();
            die();
        }

        if ( isset($_GET['action']) && $_GET['action'] == 'verificaAnoVeiculos' ) {
            $this->verificaAnoVeiculos();
            die();
        }

        if ( isset($_GET['action']) && $_GET['action'] == 'finalizarVenda' ) {
            $this->finalizarVenda();
            die();
        }

        else {            
            $this->abreIniciar();        
        }      
    }
    
    public function abreIniciar() {        
        include_once('view/vendas.php');
    }

    /**
    * Responsável por realizar compra o veículo.
    */
    public function buscarDadosMontagem() {        
        $montadoraController = new MontadoraController();
        $consulta = $montadoraController->verificaCorVeiculos();        
    }

    public function verificaAnoVeiculos() {
        $montadoraController = new MontadoraController();
        $consulta_ano = $montadoraController->verificaAnoVeiculos();
    }

    public function finalizarVenda() {
        $database = new DataSource();
        $db = $database->getConnection();        

        $venda = new Venda($db);
        
        $data = json_decode(file_get_contents("php://input"));        
        $venda->setId_documento($data->fk_id_documento);
        $venda->setDataVenda(date('Y-m-d'));
        $venda->setId_representante($data->fk_id_representante);
        $venda->setValorTotal($data->valorTotal);
        
        if ( $venda->insert() ) {
            echo(json_encode("Dados inseridos com sucesso"));            
        }
    }
    
    
}
