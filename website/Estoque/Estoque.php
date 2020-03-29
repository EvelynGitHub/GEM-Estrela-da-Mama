<?php
namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
Class Estoque {

    use IGlobal;

    private $itens;
    private $quantidadeItensRetirados;
    private $quantidadeItensEmEstoque;

    public function __construct($itens, $quantidadeItensRetirados, $quantidadeItensEmEstoque){

		$this->itens = $itens;
        $this->quantidadeItensRetirados = $quantidadeItensRetirados;
        $this->quantidadeItensEmEstoque = $quantidadeItensEmEstoque;
        
	}

    public function getItens(){
        return $this->itens;
    }

    public function setItens($itens){
        $this->itens = $itens;
    }

    public function getQuantidadeItensRetirados(){
        return $this->quantidadeItensRetirados;
    }

    public function setQuantidadeItensRetirados($quantidadeItensRetirados){
        $this->quantidadeItensRetirados = $quantidadeItensRetirados;
    }

    public function getQuantidadeItensEmEstoque(){
        return $this->quantidadeItensEmEstoque;
    }

    public function setQuantidadeItensEmEstoque($quantidadeItensEmEstoque){
        $this->quantidadeItensEmEstoque = $quantidadeItensEmEstoque;
    }

    public function retirarItemEstoque($item, $quantidadeItensRetirados){

    }
    public function verificarQuantidadeItemEmEstoque($item){

    }

    public function varificarAfiliadoAssistidaVoluntario(){

    }
}