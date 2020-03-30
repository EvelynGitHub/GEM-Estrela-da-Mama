<?php

namespace  website\classe;

require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
Class Item {
    use IGlobal;
    
    private $nomeItem;
    private $quantidade;
    private $dataEntrada;

    public function __construct($nomeItem = "", $quantidade = "", $dataEntrada = ""){

		$this->nomeItem = $nomeItem;
        $this->quantidade = $quantidade;
        $this->dataEntrada = $dataEntrada;
        
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