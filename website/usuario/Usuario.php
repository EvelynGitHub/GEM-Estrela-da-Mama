<?php

namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;

class Usuario
{
	use IGlobal;

	private $usuario;
	private $senha;

	public function __construct($usuario = "", $senha = "")
	{

		$this->usuario = $usuario;
		$this->senha = $senha;
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

	public function AdicionarAdminstrador($usuario, $senha, $conrfimarSenha)
	{
		if ($senha == $conrfimarSenha) {
			$crud = new Crud();

			$sql = "SELECT nm_login FROM  login
				WHERE  nm_login = :usuario";

			$preparaSql = array(":usuario" => $usuario);
			//var_dump($preparaSql);
			$matriz = $crud->obterRegistros($sql, $preparaSql);

			//var_dump($matriz);

			if (empty($matriz)) {
				//echo "entrou";

				$addAdministrador = array(
					'nm_login' => $usuario,
					'nm_senha' => $senha
				);
				//var_dump($addAdministrador);

				$retorno = $crud->inserirGenerico("login", $addAdministrador);
				//var_dump($retorno);


				echo "<script>
					alert('Cadastrado com sucesso');
					self.location.href='/lista-geral';					
				</script>";

				die();
				//header('Location: /lista-geral');

				//header('administrador/teste.html');
			} else {
				echo "<script>
					alert('email ja cadastrado');	
					self.location.href='/usuario/cadastrar-usuario';	
				</script>";
				die();
			}
		} else {
			echo "<script> alert('as senhas não correspondem');
					   self.location.href='cadastrar-usuario';
		</script>";
		}
	}
	public function editarAdminstrador($administrador)
	{
	}
	public function removerAdminstrador($administrador)
	{
	}
	public function listarAdministradores()
	{
	}
	public function fazerusuario($administrador)
	{
	}
}

$user = new Usuario();

$login = isset($_POST["novousuario"]) ? $_POST["novousuario"] : "";
$senha1 = isset($_POST["novasenha"]) ? $_POST["novasenha"] : "";
$conrfimarSenha = isset($_POST["confirmarsenha"]) ? $_POST["confirmarsenha"] : "";

if (isset($_POST["cadastrarAdm"])) {
	
	$user->AdicionarAdminstrador($login, $senha1, $conrfimarSenha);
	unset($_POST["cadastrarAdm"]);
}
