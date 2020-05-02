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

		$verificaUsuario = "SELECT nm_usuario FROM  login
							WHERE  nm_usuario = :usuario";
			
				$preparaSql = array(":usuario" => $this->usuario);
				if($preparaSql == null){	

					$addAdministrador = array(
				 	'nm_usuario' => $this->usuario,
				 	'nm_senha'=> $this ->senha 
				);

				echo $crud->inserirGenerico("login",$addAdministrador);
				echo "<script>
						alert('Cadastrado com sucesso');
						self.location.href='http://estreladamama.tk/administrador/cadastrar-administrador';
					</script>";
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

$login = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

if (isset($_POST["enviar"])) {
    $user->AdicionarAdminstrador($login, $senha);
    unset($_POST["cadastro"]);
}