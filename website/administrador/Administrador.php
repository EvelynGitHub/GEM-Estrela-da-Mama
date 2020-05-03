<?php

namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;
class Administrador {
	use IGlobal;

    private $usuario;
	private $senha;
	
	public function __construct($usuario = "", $senha= ""){

		$this->usuario = $usuario;
		$this->senha = $senha;	

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
    
    public function AdicionarAdminstrador($usuario,$senha){
		$crud = new Crud();            

		$sql = "SELECT nm_usuario FROM  login
							WHERE  nm_usuario = :usuario";
			
				$preparaSql = array(":usuario" => $this->usuario);

				$matriz = $crud->obterRegistros($sql, $preparaSql);

				if(empty($matriz)){	

					$addAdministrador = array(
				 	'nm_usuario' => $this->usuario,
				 	'nm_senha'=> $this ->senha 
				);

				$crud->inserirGenerico("login",$addAdministrador);
				echo "<script>
						alert('Cadastrado com sucesso');						
					</script>";
					//self.location.href='http://estreladamama.tk/administrador/cadastrar-administrador';
					header('Location: /lista-geral');
			}else{
				echo "<script>
						alert('email ja cadastrado');
						self.location.href='http://estreladamama.tk/administrador/cadastrar-administrador';
					</script>";
					
			}
			die();
		
	}
	public function editarAdminstrador($administrador){

	}
	public function removerAdminstrador($administrador){

	}
	public function listarAdministradores(){

	}
	public function fazerusuario($administrador){

    }
}

$user = new Administrador();

$login = isset($_POST["novousuario"]) ? $_POST["novousuario"] : "";
$senha1 = isset($_POST["novasenha"]) ? $_POST["novasenha"] : "";

if (isset($_POST["cadastrarAdm"])) {
    $user->AdicionarAdminstrador($login, $senha1);
    unset($_POST["cadastrarAdm"]);
}