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

    public function getAtividade(){
        return $this->atividade;
    }

    public function setAtividade($atividade){
        $this->atividade = $atividade;
    }

    public function getAfiliado(){
        return $this->afiliado;
    }

    public function setAfiliado($afiliado){
        $this->afiliado = $afiliado;
    }

    public function getPresenca(){
        return $this->presenca;
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