<?php

namespace website\classe;

require_once __DIR__.'/../global/Conexao.php';
require_once __DIR__.'/../global/Interface.php';

use Exception;
use PDO;
use Conexao;

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

	public function getNomeCompleto()
	{
		return $this->nomeCompleto;
	}

	public function setNomeCompleto($nomeCompleto)
	{
		$this->nomeCompleto = $nomeCompleto;
	}

	public function getRg()
	{
		return $this->rg;
	}

	public function setRg($rg)
	{
		$this->rg = $rg;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	public function getNacionalidade()
	{
		return $this->nacionalidade;
	}

	public function setNacionalidade($nacionalidade)
	{
		$this->nacionalidade = $nacionalidade;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}

	public function getDataNascimento()
	{
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento)
	{
		$this->dataNascimento = $dataNascimento;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}

	public function getRua()
	{
		return $this->rua;
	}

	public function setRua($rua)
	{
		$this->rua = $rua;
	}

	public function getNumeroResidencial()
	{
		return $this->numeroResidencial;
	}

	public function setNumeroResidencial($numeroResidencial)
	{
		$this->numeroResidencial = $numeroResidencial;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

	public function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}

	public function getCep()
	{
		return $this->cep;
	}

	public function setCep($cep)
	{
		$this->cep = $cep;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}

	public function getCelular()
	{
		return $this->celular;
	}

	public function setCelular($celular)
	{
		$this->celular = $celular;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEscolaridade()
	{
		return $this->escolaridade;
	}

	public function setEscolaridade($escolaridade)
	{
		$this->escolaridade = $escolaridade;
	}

	public function getSituacaoProfissional()
	{
		return $this->situacaoProfissional;
	}

	public function setSituacaoProfissional($situacaoProfissional)
	{
		$this->situacaoProfissional = $situacaoProfissional;
	}

	public function getSetorVoluntario()
	{
		return $this->setorVoluntario;
	}

	public function setSetorVoluntario($setorVoluntario)
	{
		$this->setorVoluntario = $setorVoluntario;
	}

	public function getDisponibilidade()
	{
		return $this->disponibilidade;
	}

	public function setDisponibilidade($disponibilidade)
	{
		$this->disponibilidade = $disponibilidade;
	}

	public function getCirurgiaMama()
	{
		return $this->cirurgiaMama;
	}

	public function setCirurgiaMama($cirurgiaMama)
	{
		$this->cirurgiaMama = $cirurgiaMama;
	}

	public function getDiagnostico()
	{
		return $this->diagnostico;
	}

	public function setDiagnostico($diagnostico)
	{
		$this->diagnostico = $diagnostico;
	}

	public function getConvenioMedico()
	{
		return $this->convenioMedico;
	}

	public function setConvenioMedico($convenioMedico)
	{
		$this->convenioMedico = $convenioMedico;
	}

	public function getItens()
	{
		return $this->itens;
	}

	public function setItens($itens)
	{
		$this->itens = $itens;
	}

	public function getAssistida()
	{
		return $this->assistida;
	}

	public function setAssistida($assistida)
	{
		$this->assistida = $assistida;
	}

	public function getVoluntaria()
	{
		return $this->voluntaria;
	}

	public function setVoluntaria($voluntaria)
	{
		$this->voluntaria = $voluntaria;
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
							'' AS 'Opção' FROM afiliado";
			
			$query = Conexao::conectar()->query($sql);
			$matriz = $query->fetchAll(PDO::FETCH_ASSOC); 

			/*  */

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