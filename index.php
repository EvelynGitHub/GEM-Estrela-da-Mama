<?php

include 'website//afiliado//Afiliado.php';
include 'website//atividade//Atividade.php';
include 'website//chamada//Chamada.php';
include 'website//login//Login.php';
// include 'website//lista-geral//.php';


$rota = new Rota;

class Rota
{
    private $rotas;

    public function __construct()
    {
        $this->iniciarRotas();
        $this->executar($this->getURL());
    }

    public function iniciarRotas()
    {
        $this->rotas['/'] = array('classe' => 'Login', 'metodo' => "renderizarHTML", 'parametro' => array('login', 'login.html'));
        $this->rotas['/lista-geral'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'lista-geral.html'));
        $this->rotas['/lista-atividade'] = array('classe' => 'Atividade', 'metodo' => "renderizarHTML", 'parametro' => array('atividade', 'listar-atividade.html'));
        $this->rotas['/lista-chamada'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'listar-chamada.html'));
        $this->rotas['/afiliado/cadastrar'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'cadastrar-afiliado.html'));
        // $this->rotas['/Projetos/estrelas-da-mama-3.0/home'] = array('classe' => 'Afiliado', 'metodo' => "getTelaPrincipalHTML");
    }

    public function executar($url = null)
    {
        
        if (array_key_exists($url, $this->rotas)) {

            $classe = "\\website\\classe\\" . $this->rotas[$url]['classe'];
            $metodo = $this->rotas[$url]['metodo'];
            $parametro = $this->rotas[$url]['parametro'];

            $obj = new $classe;
            call_user_func_array( array($obj, $metodo), $parametro );
                   

        } else {
            echo "<br>A url Está correta?";
        }
    }

    public function getURL()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
