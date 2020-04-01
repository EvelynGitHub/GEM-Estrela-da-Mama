<?php


namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
class Login {
    
    use IGlobal;

    private $usuario;
    private $senha;

    public function __contructor($usuario, $senha){
        $this->usuario=$usuario;
        $this->senha=$senha;

        $this->Login();
    }

    /*public function verificaLogin(){
        //verifica se há uma sessão ativa
        //se não tiver retorna para pagina de login
        if(isset($_POST['usuario']) && isset($_POST['senha'])){
            header('Location: /login.html');
            //exit();
        }
    }*/

    public function Login(){

        session_start();
        
        //$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        //$senha = mysqli_real_escape_string($conn, $_POST['senha']);

        $sql = "SELECT * 
                FROM login 
                WHERE nm_login = :usuario 
                AND nm_senha = :senha";

        $preparaSql = array(':usuario' => $this->$usuario, ':senha' => $this->$senha);

        $banco = new CRUD();
        $matriz = $banco->obterRegistros($sql, $preparaSql);

        //não entendi o CRUD direito, mas se for retornado 1 registro, faz a sessão
        //muito provavelmente oq eu fiz esta errado kk

        if(count($matriz) == 1){
            $_SESSION['usuario'] = $this->$usuario;
            header('Location: /lista-geral.html');
            //exit();
        }else{
            $_SESSION['nao_autenticado'] = "Nome de usuário ou senha invalidos";
            header('Location: /login.html');
            //exit();
        }
    }

    public function Lougout(){
        //destruir sessão
        session_destroy();
        header('Location: /login.html');
        //exit();
    }
}