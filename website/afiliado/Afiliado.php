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
	// private $estado;
	// private $cidade;
	// private $bairro;
	// private $rua;
	// private $numeroResidencial;
	// private $complemento;
	private $endereco;
	// private $cep;
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
			'nm_endereco' => $this->endereco,
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

	public function editarAfiliado($codigoAfiliado = 0, $alta = '')
	{
		$crud = new CRUD();

		$editarAfiliado = array(
			'nm_afiliado' => $this->nomeCompleto,
			'cd_rg' => $this->rg,
			'cd_cpf' => $this->cpf,
			'nm_nacionalidade' => $this->nacionalidade,
			'ic_sexo' => $this->sexo,
			'dt_nascimento' => $this->dataNascimento,
			'nm_endereco' => $this->endereco,
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
			'nm_convenio_medico' => $this->convenioMedico,
			'nm_status_assistida' => $alta	
		);

		$editarCondicao = array('cd_afiliado' => $codigoAfiliado);

		echo $crud->updateGenerico("afiliado", $editarAfiliado, $editarCondicao);
		exit();
	}

	public function excluirAfiliado($afiliado)
	{
	}

	public function listarAfiliado()
	{
		try {
			$sql = " SELECT * FROM vw_afiliado ";
			$preparaSQL = "";

			$banco = new CRUD();

			if (isset($_POST["btnAfiliado"])) { // Se o botão foi clicado

				$filtroAfiliado = isset($_POST["afiliado"]) ? $_POST["afiliado"] : "";

				if ($filtroAfiliado != "todos") { // E se o valor do radio for diferente de "todos"
					$sql .= "WHERE Tipo=LOWER(:filtro) "; // coloque este WHERE
					$preparaSQL = array(':filtro' => $filtroAfiliado); // prepare este sql
				}
			} else if (isset($_POST["btnAssistida"])) { // Se o botão foi clicado

				$statusAssistida = isset($_POST["assistida"]) ? $_POST["assistida"] : "";

				$sql .= "WHERE LOWER(Status) = LOWER(:filtro) ";
				$preparaSQL = array(':filtro' => $statusAssistida);
			} else if (isset($_POST["btnCargo"])) {

				$afiliadoVoluntario = isset($_POST["voluntario"]) ?  $_POST["voluntario"] : "";
				$afiliadoCargo = isset($_POST["cargo"]) ? $_POST["cargo"] : "";

				// Não tem problema os 'ç' e '~', pois estes são os nomes das colunas da view
				if ($afiliadoVoluntario != "") {

					$sql .= "WHERE LOWER(Status) = LOWER(:status)";
					$preparaSQL = array(':status' => $afiliadoVoluntario);

					if ($afiliadoCargo != "") {
						$sql .= "AND Função LIKE :cargo ";
						$preparaSQL[":cargo"] = "%$afiliadoCargo%";
					}
				} else {

					$sql .= "WHERE Função LIKE :cargo "; // coloque este WHERE
					$preparaSQL = array(':cargo' => "%$afiliadoCargo%");
				}
			}

			$matriz = $banco->obterRegistros($sql, $preparaSQL);

			$array['cd'] = array('Opção' => "<a href='?id=@codigo@' class=''>
												<i class='far fa-id-card' style='font-size: 1.5rem;'></i>
											</a>
											<a href='/afiliado/editar?id=@codigo@' class=''>
												<i class='far fa-edit' style='font-size: 1.5rem;'></i>
											</a>");

			echo "<p id='qtdRetornados' hidden> N°: " . count($matriz) . "</p>";
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

	private function retornarAfiliado($afiliado, $tabela = 'vw_dados_afiliado')
	{
		$sql = "SELECT * FROM $tabela WHERE cd_afiliado = :cd";

		$preparaSql = array(':cd' => $afiliado);

		$banco = new CRUD();
		$matriz = $banco->obterRegistros($sql, $preparaSql);

		return $matriz[0];
	}

	public function buscaAfiliadoNome($nome, $tabela = 'vw_dados_afiliado'){

		$sql = "SELECT * FROM $tabela WHERE `Nome:` LIKE :nome ";

		$preparaSql = array(':nome' => "%$nome%");

		$array['cd'] = array('Opção' => "<a href='?id=@codigo@' class=''>
												<i class='far fa-id-card' style='font-size: 1.5rem;'></i>
											</a>
											<a href='/afiliado/editar?id=@codigo@' class=''>
												<i class='far fa-edit' style='font-size: 1.5rem;'></i>
											</a>");

		$banco = new CRUD();

		$matriz = $banco->obterRegistros($sql, $preparaSql);

		echo $this->rederizarTabela($matriz, $array, "@codigo@");

	}
}

if(isset($_GET['buscarAfiliadoNome'])){

	$afiliado = new Afiliado();

	$afiliado->buscaAfiliadoNome($_GET['nome']);

}

// if (isset($_POST['btn-enviar'])) {
if (isset($_POST['formulario-afiliado'])) {
	$cadAfiliado = new Afiliado();

	try {
		// CAMPOS OBRIGATÓRIOS 
		$cadAfiliado->nomeCompleto = $_POST['nome'];
		$cadAfiliado->rg = $_POST['rg'];
		$cadAfiliado->cpf = removeCaracter($_POST['cpf']);
		$cadAfiliado->nacionalidade = $_POST['nacionalidade'];
		$cadAfiliado->dataNascimento = $_POST['data'];
		if (isset($_POST['bairro']) && isset($_POST['cidade'])) {
			$cadAfiliado->endereco = $_POST['bairro'] . " " . $_POST['cidade'] . "/" . $_POST['estado'] . " " . $_POST['cep'];
		} else {
			$cadAfiliado->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "";
		}
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

		$cadAfiliado->cirurgiaMamaDireita = isset($_POST['mamaDireita']) ? TRUE : FALSE;
		$cadAfiliado->anoCirurgiaDireita = isset($_POST['anoDireita']) ? $_POST['anoDireita'] : NULL;

		$cadAfiliado->cirurgiaMamaEsquerda = isset($_POST['mamaEsquerda']) ? TRUE : FALSE;
		$cadAfiliado->anoCirurgiaEsquerda = isset($_POST['anoEsquerda']) ? $_POST['anoEsquerda'] : NULL;

		$cadAfiliado->convenioMedico = isset($_POST['convenio']) ? $_POST['convenio'] : "";
	} catch (Exception $e) {
		echo $e;
	} catch (Throwable $e) {
		echo $e;
	}

	if (isset($_POST['btn-enviar'])) {
		if(verificarCpfExistente($cadAfiliado->cpf)){
			$cadAfiliado->cadastrarAfiliado($cadAfiliado);
		}else {
			echo '<script>
						alert("CPF JÁ CADASTRADO NA BASE DE DADOS");
						history.go(-1);
				  </script>';
		}
		
	}

	if (isset($_POST['btn-editar'])) {
		
		if(verificarCpfExistente($cadAfiliado->cpf, $_GET['id'])){
			$cadAfiliado->editarAfiliado($_GET['id'], $_POST['alta']);
		}else {
			echo '<script>
						alert("CPF JÁ CADASTRADO NA BASE DE DADOS");
						history.go(-1);
				  </script>';
		}
	}
	
	if (isset($_POST['btn-cancelar-editar'])) {

		header("Location: /lista-geral");		
		
		exit();
	}
}

function removeCaracter ($string = "") {
	
	$arrayCaracter = ['(', ')', '.', '-'];

	for($i = 0; $i < count($arrayCaracter); $i++) 
	{
		$string = str_replace($arrayCaracter[$i], "", $string);
	}

	return $string;
}

function verificarCpfExistente ($cpf = "", $id = 0) {

	$crud = new CRUD();

	$selectCpf = "SELECT cd_afiliado FROM afiliado WHERE cd_cpf = :cpf";

	$condicaoSelect = array(':cpf' => $cpf);

	$cpfAfiliado = $crud->obterRegistros($selectCpf, $condicaoSelect);

	if ($cpfAfiliado[0]["cd_afiliado"] != 0) {
		if($id != 0) {
			if($id == $cpfAfiliado[0]["cd_afiliado"]){
				return true;
			} else {
				return false;
			}
		} 
		return false;	
	} else {
		return true;
	}	
}