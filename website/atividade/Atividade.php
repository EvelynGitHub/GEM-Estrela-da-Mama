<?php

namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
class Atividade {

	use IGlobal;

    private $nomeAtividade;
    private $horaAtividade;
    private $date;
    private $afiliado;
	private $quantidadeAulas;
	
	public function __construct($nomeAtividade = "", $horaAtividade = "", $date = "", $afiliado = "", $quantidadeAulas = ""){
        if (!isset($_SESSION['usuario']) == true) {
			unset($_SESSION['usuario']);
			header("Location: /");
        }
        
		$this->nomeAtividade = $nomeAtividade;
		$this->horaAtivdade = $horaAtividade;
		$this->date = $date;
    	$this->afiliado = $afiliado;
		$this->quantidadeAulas = $quantidadeAulas;

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

    public function criarAtividade($atividade){

    }
    public function editarAtividade($atividade){

    }
    public function excluirAtividade($atividade){

    }
    public function listarAtividades(){

    }
    public function adicionarAfiliado($afiliado){

    }
    public function removerAfiliado($afiliado){

    }
    private function verificatAtividadeExiste($atividade){

    }
    private function verificarCamposNulosAtividade(){

    }
    
}