<?php

namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
class Atividade {

	use IGlobal;

    private $nomeAtividade;
    private $horaAtividade;
    private $date;
    private $afiliado;
	private $quantidadeAulas;
	
	public function __construct($nomeAtividade, $horaAtividade, $date, $afiliado, $quantidadeAulas){

		$this->nomeAtividade = $nomeAtividade;
		$this->horaAtivdade = $horaAtividade;
		$this->date = $date;
    	$this->afiliado = $afiliado;
		$this->quantidadeAulas = $quantidadeAulas;

	}


    public function getNomeAtividade(){
		return $this->nomeAtividade;
	}

	public function setNomeAtividade($nomeAtividade){
		$this->nomeAtividade = $nomeAtividade;
	}

	public function getHoraAtividade(){
		return $this->horaAtividade;
	}

	public function setHoraAtividade($horaAtividade){
		$this->horaAtividade = $horaAtividade;
	}

	public function getDate(){
		return $this->date;
	}

	public function setDate($date){
		$this->date = $date;
	}

	public function getAfiliado(){
		return $this->afiliado;
	}

	public function setAfiliado($afiliado){
		$this->afiliado = $afiliado;
	}

	public function getQuantidadeAulas(){
		return $this->quantidadeAulas;
	}

	public function setQuantidadeAulas($quantidadeAulas){
		$this->quantidadeAulas = $quantidadeAulas;
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