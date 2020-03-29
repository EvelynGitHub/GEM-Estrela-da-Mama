<?php

namespace  website\classe;

require_once __DIR__.'/../global/Interface.php';
Class Item {
    use IGlobal;
    
    private $nomeItem;
    private $quantidade;
    private $dataEntrada;

    public function __construct($nomeItem, $quantidade, $dataEntrada){

		$this->nomeItem = $nomeItem;
        $this->quantidade = $quantidade;
        $this->dataEntrada = $dataEntrada;
        
	}

    public function getNomeItem(){
        return $this->nomeItem;
    }

    public function setNomeItem($nomeItem){
        $this->nomeItem = $nomeItem;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function getDataEntrada(){
        return $this->dataEntrada;
    }

    public function setDataEntrada($dataEntrada){
        $this->dataEntrada = $dataEntrada;
    }

    public function cadastrarItem($item){

    }
    public function editarItem($item){

    }
    public function removerItem($item){

    }
    private function verificarItemExiste($item){

    }
    private function verificarCamposNulosItem(){

    }

}