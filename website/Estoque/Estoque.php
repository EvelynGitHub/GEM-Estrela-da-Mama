<?php
namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
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

	public function __get($atributo){
        if(!property_exists($this, $atributo)){
            throw new Exception("Atributo {$atributo} não existe nessa classe");
		}
		
      	return $this->{$atributo};
    }

    public function __set($atributo, $valor){
     
        if(!property_exists($this, $atributo)){
            throw new Exception("Atributo {$atributo} não existe nessa classe");
        }

        $this->{$atributo} = $valor;
    }

    public function retirarItemEstoque($item, $quantidadeItensRetirados){

    }
    public function verificarQuantidadeItemEmEstoque($item){

    }

    public function varificarAfiliadoAssistidaVoluntario(){

    }
}