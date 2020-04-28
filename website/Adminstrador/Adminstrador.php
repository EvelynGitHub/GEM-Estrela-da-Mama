<?php

namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
Class Administrador {

    private $login;
	private $senha;
	
	public function __construct($login = "", $senha= ""){

		$this->login = $login;
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
    
    public function AdicionarAdminstrador($login,$senha){
		$crud = new Crud();
		if($login != null && $senha != null){
			
				$addAdministrador = array(
				 'nm_login' => $this->login,
				 'nm_senha'=> $this ->senha 
				);
				echo $crud->inserirGenerico("login",$addAdministrador);
				die();
		}
		
	}
	public function editarAdminstrador($administrador){

	}
	public function removerAdminstrador($administrador){

	}
	public function listarAdministradores(){

	}
	public function fazerLogin($administrador){

    }
}