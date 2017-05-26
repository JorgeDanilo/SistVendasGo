<?php

include_once("ControllerBase.php");
include_once("conexao/DataSource.php");

/**
 * Classe controladora dos fluxos relacionados ao representantes.
 *
 * @author Jorge Danilo Gomes da Silva
 */
class RepresentanteController extends ControllerBase {
    
    public function index() {
        include 'view/representante.php';
    }
    
    
}
