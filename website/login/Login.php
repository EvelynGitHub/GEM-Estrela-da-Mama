<?php
session_start();

namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
class Login {
    
    use IGlobal;

    private $usuario;
    private $senha;

    public function __contructor(){
        $this->usuario=$usuario;
        $this->senha=$senha;
    }

    public function verificaLogin(){
        //verifica se há uma sessão ativa
        //se não tiver retorna para pagina de login
        if(isset($_POST['usuario'] && isset($_POST['senha']))){
            header('Location: login.html');
            exit();
        }
    }

    public function Login(){
        
        //$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        //$senha = mysqli_real_escape_string($conn, $_POST['senha']);

        $sql = "SELECT * FROM login nm_login = :usuario, nm_senha = :senha";

        $preparaSql = array(':nm_login' => $usuario, ':senha' => $senha);

        $banco = new CRUD();
        $matriz = $banco->obterRegistros($sql, $preparaSql);


        //não entendi o CRUD direito, mas se for retornado 1 registro, faz a sessão
        //muito provavelmente oq eu fiz esta errado kk
        if($matriz == 1){
            $_SESSION['usuario'] = $usuario;
            header('Location: ');
            exit();
        }else{
            $_SESSION['nao_autenticado'] = "Nome de usuário ou senha invalidos";
            header('Location: login.html');
            exit();
        }
    }

    public function Lougout(){
        //destruir sessão
        session_destroy();
        header('Location: login.html');
        exit();
    }
}