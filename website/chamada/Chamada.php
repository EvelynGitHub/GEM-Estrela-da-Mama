<?php

namespace website\classe;

class Chamada {





        
    public function getTelaPrincipalHTML()
    {
        $this->renderizarHTML("listar-chamada.html");
    }
    public function renderizarHTML($ver){
        include "website//chamada//$ver";
    }

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