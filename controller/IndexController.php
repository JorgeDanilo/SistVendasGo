<?php
include_once("model/Carro.php");
include_once("conexao/DataSource.php");
include_once("ControllerBase.php");

class IndexController extends ControllerBase {
    
    public $model;
    
    public function __construct() {
        $this->model = new Carro();
    }
    
        
}

