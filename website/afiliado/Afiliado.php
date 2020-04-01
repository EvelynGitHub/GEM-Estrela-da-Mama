<?php

namespace website\classe;

// require_once __DIR__.'/../global/Conexao.php';
require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;

class Afiliado 
{
	use IGlobal;

	private $nomeCompleto;
	private $rg;
	private $cpf;
	private $nacionalidade;
	private $sexo;
	private $dataNascimento;
	private $estado;
	private $cidade;
	private $bairro;
	private $rua;
	private $numeroResidencial;
	private $complemento;
	private $cep;
	private $telefone;
	private $celular;
	private $email;
	private $escolaridade;
	private $situacaoProfissional;
	private $setorVoluntario;
	private $disponibilidade;
	private $cirurgiaMama;
	private $diagnostico;
	private $convenioMedico;
	private $itens;
	private $assistida;
	private $voluntaria;


	public function __construct($nomeCompleto = "", $rg = "", $cpf = "", $nacionalidade = "", $sexo = "", $dataNascimento = "", $estado = "", $cidade = "", $bairro = "", $rua = "", $numeroResidencial = "", $complemento = "", $cep = "", $telefone = "", $celular = "", $email = "", $escolaridade = "", $situacaoProfissional = "", $setorVoluntario = "", $disponibilidade = "", $cirurgiaMama = "", $diagnostico = "", $convenioMedico = "", $itens = "", $assistida = "", $voluntaria = "")
	{
		if (!isset($_SESSION['usuario']) == true) {
            unset($_SESSION['usuario']);
            header("Location: /");
        }

		$this->nomeCompleto = $nomeCompleto;
		$this->rg = $rg;
		$this->cpf = $cpf;
		$this->nacionalidade = $nacionalidade;
		$this->sexo = $sexo;
		$this->dataNascimento = $dataNascimento;
		$this->estado = $estado;
		$this->cidade = $cidade;
		$this->bairro = $bairro;
		$this->rua = $rua;
		$this->numeroResidencial = $numeroResidencial;
		$this->complemento = $complemento;
		$this->cep = $cep;
		$this->telefone = $telefone;
		$this->celular = $celular;
		$this->email = $email;
		$this->escolaridade = $escolaridade;
		$this->situacaoProfissional = $situacaoProfissional;
		$this->setorVoluntario = $setorVoluntario;
		$this->disponibilidade = $disponibilidade;
		$this->cirurgiaMama = $cirurgiaMama;
		$this->diagnostico = $diagnostico;
		$this->convenioMedico = $convenioMedico;
		$this->itens = $itens;
		$this->assistida = $assistida;
		$this->voluntaria = $voluntaria;
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


	public function cadastrarAfiliado($afiliado)
	{
	}

	public function editarAfiliado($afiliado)
	{
	}

	public function excluirAfiliado($afiliado)
	{
	}

	public function listarAfiliado()
	{
		try {
			$sql = " SELECT cd_afiliado AS 'cd',
							nm_afiliado AS 'Nome', 
							nm_tipo_afiliado AS 'Tipo',
							nm_area_interesse AS 'Função', 
							dt_nascimento AS 'Data de Nascimento', 
							cd_telefone AS 'Telefone',
							nm_estado AS 'Estado',
							'' AS 'Opção' FROM afiliado ";

			$banco = new CRUD();
			
			$matriz = $banco->obterRegistros($sql);

			$array['cd'] = array('Opção' => "<a href='exemplo1?id=@codigo@' class=''>
												<i class='far fa-eye' style='font-size: 1.5rem;'></i>
											</a>
											<a href='exemplo2?id=@codigo@' class=''>
												<i class='far fa-edit' style='font-size: 1.5rem;'></i>
											</a>");

		
			echo $this->rederizarTabela($matriz, $array, "@codigo@");	
			
		} catch (Exception $e) {
			echo "Erro ao listar Afiliados: $e";
		}
	}

	private function verificarAfiliadoExiste($afiliado)
	{
	}

	private function verificarCamposNulos()
	{
	}

	private function retornarAfiliado($afiliado)
	{
		echo "retornarAfiliado() >> $afiliado";
	}

}