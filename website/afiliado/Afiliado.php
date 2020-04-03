<?php

namespace website\classe;

// require_once __DIR__.'/../global/Conexao.php';
require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

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

	public function __get($atributo)
	{
		if (!property_exists($this, $atributo)) {
			throw new Exception("Atributo {$atributo} não existe nessa classe");
		}

		return $this->{$atributo};
	}

	public function __set($atributo, $valor)
	{

		if (!property_exists($this, $atributo)) {
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
							nm_status_voluntario AS 'Estado',
							'' AS 'Opção' FROM afiliado ";
			$preparaSQL = "";

			$banco = new CRUD();

			if (isset($_POST["btnAfiliado"])) { // Se o botão foi clicado
				$filtroAfiliado = isset($_POST["afiliado"]) ? $_POST["afiliado"] : "";
				if ($filtroAfiliado != "todos") { // E se o valor do radio for diferente de "todos"
					$sql .= "WHERE nm_tipo_afiliado=LOWER(:filtro) "; // coloque este WHERE
					$preparaSQL = array(':filtro' => $filtroAfiliado); // prepare este sql
				}
			} else if (isset($_POST["btnAssistida"])) { // Se o botão foi clicado

				$filtroAssistida = isset($_POST["assistida"]) ? $_POST["assistida"] : "";
				// Falta informação para concluir o select
				echo "Está função ainda não foi construida, por favor aguarde ou entre em contato.";
				// $sql .= "WHERE nm_tipo_afiliado=LOWER(:filtro) "; 
				// $preparaSQL = array(':filtro' => $filtroAfiliado); 

			} else if (isset($_POST["btnCargo"])) {
				$afiliadoVoluntario = isset($_POST["voluntario"]) ?  $_POST["voluntario"] : "";
				$afiliadoCargo = isset($_POST["cargo"]) ? $_POST["cargo"] : "";

				if (isset($afiliadoVoluntario)) {

					$sql .= "WHERE nm_status_voluntario = LOWER(:status)";
					$preparaSQL = array(':status' => $afiliadoVoluntario);

					if (isset($afiliadoCargo)) {
						$sql .= "AND nm_area_interesse LIKE :cargo ";
						$preparaSQL[":cargo"] = "%$afiliadoCargo%";
					}
				} else {
					$sql .= "WHERE nm_area_interesse LIKE :cargo "; // coloque este WHERE
					$preparaSQL = array(':cargo' => "%$afiliadoCargo%");
				}
			}

			$matriz = $banco->obterRegistros($sql, $preparaSQL);

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


// $filtro = isset($_POST["afiliado"]) ? $_POST["afiliado"] : "";

// if (isset($_POST["btnAfiliado"])) {
// 	echo "foi clicado btnAfiliado";
// }else{
// 	echo "não foi clicado $filtro";
// }
