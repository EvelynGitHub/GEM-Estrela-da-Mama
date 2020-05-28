<?php


namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;

session_start();
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

    public function Login()
    {
        $sql = "SELECT * FROM login WHERE nm_login = :usuario AND nm_senha = :senha ";

        $preparaSql = array(":usuario" => $this->usuario, ":senha" => $this->senha);

        $banco = new CRUD();
        $matriz = $banco->obterRegistros($sql, $preparaSql);

        if (!empty($matriz)) {
  //          var_dump($matriz);
            if($matriz['nm_tipo_usuario']  == true){
                
                $_SESSION['usuario'] = $this->usuario;
                header('Location: /lista-geral');
                die();
            } else{
                $_SESSION['usuario'] = $this->usuario;
                header('Location: /lista-chamada');
                die();
            }
        } else {
            echo "<script>
                        alert('Nome de usuário ou senha invalidos');
                        self.location.href='http://estreladamama.tk/';
                    </script>";
            die();
        }
    }

    public function Lougout()
    {
        session_destroy();
        header('Location: /');
        die();
    }
}

$user = new Login;

$login = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

if (isset($_POST["enviar"])) {
    $user->setValores($login, $senha);
    unset($_POST["enviar"]);
}
