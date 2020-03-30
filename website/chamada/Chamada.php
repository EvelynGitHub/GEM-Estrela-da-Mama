<?php

namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
class Chamada {

    use IGlobal;

    private $atividade;
    private $afiliado;
    private $presenca;

    public function __construct($atividade, $afiliado, $presenca){

		$this->atividade = $atividade;
        $this->afiliado = $afiliado;
        $this->presenca = $presenca;
        
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

    public function adicionarPresenca(Afiliado $afiliado, Atividade $atividade){

    }
    public function removerPresenca(Afiliado $afiliado, Atividade $atividade){

    }
    public function salvarChamada($chamada){

    }
    public function editarListaChamada($chamada){

    }

}