<?php


namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;

class Login
{

    use IGlobal;

    private $usuario;
    private $senha;

    function setValores($usu, $pass)
    {
        $this->usuario = $usu;
        $this->senha = $pass;

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

    public function Login()
    {

        session_start();

        $sql = "SELECT * FROM login WHERE nm_login = :usuario AND nm_senha = :senha ";

        $preparaSql = array(":usuario" => $this->usuario, ":senha" => $this->senha);

        $banco = new CRUD();
        $matriz = $banco->obterRegistros($sql, $preparaSql);

        if (!empty($matriz)) {
            $_SESSION['usuario'] = $this->usuario;
            header('Location: /Projetos/GEM/GEM-Estrela-da-Mama-2/lista-geral');
            //exit();
        } else {
            echo "<script>
                        alert('Nome de usuário ou senha invalidos');
                        /*self.location.href='/login';*/
                    </script>";
            //header('Location: ./login.html');
            //exit();
        }
    }

    public function Lougout()
    {
        //destruir sessão
        session_destroy();
        header('Location: /');
        //exit();
    }
}

$user = new Login;

$login = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

if (isset($_POST["enviar"])) {
    $user->setValores($login, $senha);
    unset($_POST["enviar"]);
}
