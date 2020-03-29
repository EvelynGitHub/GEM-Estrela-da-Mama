<?php

require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
Class Administrador {

    private $login;
	private $senha;
	
	public function __construct($login, $senha){

		$this->login = $login;
		$this->senha = $senha;	

	}

    public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
    }
    
    public function AdicionarAdminstrador($administrador){

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