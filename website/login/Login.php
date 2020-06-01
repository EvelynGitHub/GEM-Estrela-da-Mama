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
            $pegaTipoUsuario = $matriz[0]['nm_tipo_usuario'];
            //var_dump($matriz[0]['nm_tipo_usuario']);
            //var_dump($pegaTipoUsuario);
            
            if($pegaTipoUsuario == 1){
                
                //echo "entrou";
                $_SESSION['usuario'] = $matriz[0]['nm_tipo_usuario'];
                //var_dump($_SESSION['usuario']);
                header('Location: /lista-geral');
                //localhost
                //header('Location: /GEM-Estrela-da-mama/lista-geral');
                die();
            } else{
                //echo "nao entrou";
                $_SESSION['usuario'] = $matriz[0]['nm_tipo_usuario'];
                header('Location: /chamada/listar-chamada');
                 //var_dump($_SESSION['usuario']);
                //header('Location: /GEM-Estrela-da-mama/lista-chamada');
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
        
        //LocalHost
        //header('Location: /GEM-Estrela-da-mama/ ');
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
