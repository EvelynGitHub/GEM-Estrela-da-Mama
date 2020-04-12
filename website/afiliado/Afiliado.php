<?php

namespace website\classe;

// require_once __DIR__.'/../global/Conexao.php';
require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;
use Error;
use Throwable;

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
	// private $rua;
	// private $numeroResidencial;
	// private $complemento;
	private $endereco;
	private $cep;
	private $telefone;
	private $celular;
	private $email;
	private $escolaridade;
	private $situacaoProfissional;
	private $tipoAfiliado;
	private $setorVoluntario;
	private $disponibilidade;
	private $diagnostico;
	private $cirurgiaMamaDireita;
	private $anoCirurgiaDireita;
	private $cirurgiaMamaEsquerda;
	private $anoCirurgiaEsquerda;
	private $convenioMedico;
	private $itens;
	// private $assistida;
	// private $voluntaria;



	// public function __construct($nomeCompleto = "", $rg = "", $cpf = "", $nacionalidade = "", $sexo = "", $dataNascimento = "", $estado = "", $cidade = "", $bairro = "", $cep = "", $telefone = "", $celular = "", $email = "", $escolaridade = "", $situacaoProfissional = "", $setorVoluntario = "", $disponibilidade = "", $diagnostico = "", $convenioMedico = ""/*, $itens = ""*/)
	// {
	// 	$this->nomeCompleto = $nomeCompleto;
	// 	$this->rg = $rg;
	// 	$this->cpf = $cpf;
	// 	$this->nacionalidade = $nacionalidade;
	// 	$this->sexo = $sexo;
	// 	$this->dataNascimento = $dataNascimento;
	// 	$this->estado = $estado;
	// 	$this->cidade = $cidade;
	// 	$this->bairro = $bairro;
	// 	// $this->rua = $rua;
	// 	// $this->numeroResidencial = $numeroResidencial;
	// 	// $this->complemento = $complemento;
	// 	$this->cep = $cep;
	// 	$this->telefone = $telefone;
	// 	$this->celular = $celular;
	// 	$this->email = $email;
	// 	$this->escolaridade = $escolaridade;
	// 	$this->situacaoProfissional = $situacaoProfissional;
	// 	$this->setorVoluntario = $setorVoluntario;
	// 	$this->disponibilidade = $disponibilidade;
	// 	$this->diagnostico = $diagnostico;
	// 	$this->convenioMedico = $convenioMedico;
	// 	// $this->assistida = $assistida;
	// 	// $this->voluntario = $voluntario;
	// 	// $this->itens = $itens;
	// }

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


	public function cadastrarAfiliado($afiliado = "")
	{
		$crud = new CRUD();

		$inserirAfiliado = array(
			'nm_afiliado' => $this->nomeCompleto,
			'cd_rg' => $this->rg,
			'cd_cpf' => $this->cpf,
			'nm_nacionalidade' => $this->nacionalidade,
			'ic_sexo' => $this->sexo,
			'dt_nascimento' => $this->dataNascimento,
			'nm_estado' => $this->estado,
			'nm_cidade' => $this->cidade,
			'nm_bairro' => $this->bairro,
			'nm_endereco' => $this->endereco,
			'cd_cep' => $this->cep,
			'cd_telefone' => $this->telefone,
			'cd_contato' => $this->celular,
			'nm_email' => $this->email,
			'nm_escolaridade' => $this->escolaridade,
			'nm_situacao_profissional' => $this->situacaoProfissional,
			'nm_tipo_afiliado' => $this->tipoAfiliado,
			'nm_area_interesse' => $this->setorVoluntario,
			'nm_disponibilidade' => $this->disponibilidade,
			'nm_diagnostico' => $this->diagnostico,
			'nm_cirurgia_mama_direita' => $this->cirurgiaMamaDireita,
			'dt_cirugia_mama_direita' => $this->anoCirurgiaDireita,
			'nm_cirurgia_mama_esquerda' => $this->cirurgiaMamaEsquerda,
			'dt_cirugia_mama_esquerda' => $this->anoCirurgiaEsquerda,
			'nm_convenio_medico' => $this->convenioMedico
		);

		echo $crud->inserirGenerico("afiliado", $inserirAfiliado);
		die();
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
				
				$statusAssistida = isset($_POST["assistida"]) ? $_POST["assistida"] : "";
				
				$sql .= "WHERE nm_status_assistida=LOWER(:filtro) ";
				$preparaSQL = array(':filtro' => $statusAssistida);

			} else if (isset($_POST["btnCargo"])) {
				
				$afiliadoVoluntario = isset($_POST["voluntario"]) ?  $_POST["voluntario"] : "";
				$afiliadoCargo = isset($_POST["cargo"]) ? $_POST["cargo"] : "";

				if ($afiliadoVoluntario != "") {

					$sql .= "WHERE nm_status_voluntario = LOWER(:status)";
					$preparaSQL = array(':status' => $afiliadoVoluntario);

					if ($afiliadoCargo != "") {
				
						$sql .= "AND nm_area_interesse LIKE :cargo ";
						$preparaSQL[":cargo"] = "%$afiliadoCargo%";
				
					}
				} else {
					
					$sql .= "WHERE nm_area_interesse LIKE :cargo "; // coloque este WHERE
					$preparaSQL = array(':cargo' => "%$afiliadoCargo%");
				
				}
			}

			$matriz = $banco->obterRegistros($sql, $preparaSQL);

			$array['cd'] = array('Opção' => "<a href='?id=@codigo@' class=''>
												<i class='far fa-eye' style='font-size: 1.5rem;'></i>
											</a>
											<a href='editar?id=@codigo@' class=''>
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
		$sql = " SELECT * FROM afiliado WHERE cd_afiliado = :cd";

		$preparaSql = array(':cd' => $afiliado);

		$banco = new CRUD();
		$matriz = $banco->obterRegistros($sql, $preparaSql);

		return $matriz[0];
	}
}

if (isset($_POST['btn-enviar'])) {

	$cadAfiliado = new Afiliado();

	try {
		// CAMPOS OBRIGATÓRIOS 
		$cadAfiliado->nomeCompleto = $_POST['nome'];
		$cadAfiliado->rg = $_POST['rg'];
		$cadAfiliado->cpf = $_POST['cpf'];
		$cadAfiliado->nacionalidade = $_POST['nacionalidade'];
		// $cadAfiliado->dataNascimento = $_POST['data'];
		$cadAfiliado->dataNascimento = '2010/10/20';
		$cadAfiliado->estado = $_POST['estado'];
		$cadAfiliado->cidade = $_POST['cidade'];
		$cadAfiliado->bairro = $_POST['bairro'];
		$cadAfiliado->cep = $_POST['cep'];
		$cadAfiliado->endereco = "Sem endereco";
		$cadAfiliado->telefone = $_POST['telefone'];
		$cadAfiliado->celular = $_POST['celular'];
		$cadAfiliado->email = $_POST['email'];
		$cadAfiliado->escolaridade = $_POST['escolaridade'];
		$cadAfiliado->situacaoProfissional = $_POST['sitProfissional'];
		$cadAfiliado->sexo = $_POST['sexo'];
		$cadAfiliado->tipoAfiliado = $_POST['tipo'];


		// CAMPOS NÃO OBRIGATÓRIOS

		// 	- VOLUNTÁRIO

		$cadAfiliado->setorVoluntario = isset($_POST['interesse']) ? $_POST['interesse'] : "";

		$semanas = isset($_POST['semana']) ? $_POST['semana'] : [];

		$diponibiliadadeAfiliado = "";

		for ($i = 0; $i < count($semanas); $i++) {
			$diponibiliadadeAfiliado = "$diponibiliadadeAfiliado ; $semanas[$i]";
		}

		$cadAfiliado->disponibilidade = isset($diponibiliadadeAfiliado) ? $diponibiliadadeAfiliado : "";


		// 	- ASSISTIDA
		$cadAfiliado->diagnostico = isset($_POST['diagnostico']) ? $_POST['diagnostico'] : "";

		$cadAfiliado->cirurgiaMamaDireita = isset($_POST['mamaDireita']) ? $_POST['mamaDireita'] : "false";
		$cadAfiliado->anoCirurgiaDireita = isset($_POST['anoDireita']) ? $_POST['anoDireita'] : NULL;

		$cadAfiliado->cirurgiaMamaEsquerda = isset($_POST['mamaEsquerda']) ? $_POST['mamaEsquerda'] : "false";
		$cadAfiliado->anoCirurgiaEsquerda = isset($_POST['anoEsquerda']) ? $_POST['anoEsquerda'] : NULL;

		$cadAfiliado->convenioMedico = isset($_POST['convenio']) ? $_POST['convenio'] : "";
	} catch (Exception $e) {
		echo $e;
	} catch (Throwable $e) {
		echo $e;
	}

	$cadAfiliado->cadastrarAfiliado($cadAfiliado);
}

if (isset($_POST['btn-cancelar'])) {
	header("Location: http://estreladamama.tk/lista-geral");
}