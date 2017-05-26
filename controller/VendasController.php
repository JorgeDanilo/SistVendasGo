<?php

include_once("ControllerBase.php");
include_once("conexao/DataSource.php");

/**
 * Description of Vendas
 *
 * @author danilo
 */
class VendasController extends ControllerBase {
    
    public function index() {
        if ( isset($_GET['action']) && $_GET['action'] == 'save' ) {                                   
            $this->salvar();          
        }        
        else {            
            $this->abreIniciar();        
        }      
    }
    
    public function abreIniciar() {        
        include_once('view/vendas.php');
    }
    
    
}
