<?php

/**
 * Classe Abstrata Base do controlador.
 */
abstract class ControllerBase {
    
    /**
     * Funcão responsável por iniciar o caso de uso.
     */
    public function index() {            
        if ( !isset($_GET['carros']) ) {            
           $this->abreIniciar();
        }
        
    }
    
    
    /**
     * Função responsável por abrir o caso de uso.
     */
    public function abreIniciar() { 
        $carros = $this->model->listar();
        include "view/principal.php";            
    }          
    
    
    /**
     * Funcão responsável por voltar para a tela principal.
     */
    public function voltarInicio() {
        $this->abreIniciar();
    }
    
    
    /**
     * Função responsável por salvar os dados.
     */
    public function salvar() {
        
    }
    
    
    /*
     * Função responsável por listar todos
     */
    public function listaTodos() {
        
    }
    
    
    
   
}
