<?php

include_once("ControllerBase.php");
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

        //$consulta_ano = $montadoraController->verificaAnoVeiculos();

    }

    public function verificaAnoVeiculos() {
        $montadoraController = new MontadoraController();
        $consulta_ano = $montadoraController->verificaAnoVeiculos();
    }
    
    
}
