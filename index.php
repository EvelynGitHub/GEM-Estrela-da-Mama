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
        // Rotas do Servidor (produção)
        $this->rotas['/'] = array('classe' => 'Login', 'metodo' => "renderizarHTML", 'parametro' => array('login', 'login.html'));
        $this->rotas['/lista-geral'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'lista-geral.html'));
        $this->rotas['/lista-atividade'] = array('classe' => 'Atividade', 'metodo' => "renderizarHTML", 'parametro' => array('atividade', 'listar-atividade.html'));
        $this->rotas['/lista-chamada'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'listar-chamada.html'));
        $this->rotas['/afiliado/cadastrar'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'cadastrar-afiliado.html'));
        $this->rotas['/afiliado/sair'] = array('classe' => 'Login', 'metodo' => "Lougout", 'parametro' => array());

        //Rotas do localhost (desenvolvimento)
        // $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/'] = array('classe' => 'Login', 'metodo' => "renderizarHTML", 'parametro' => array('login', 'login.html'));
        // $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/lista-geral'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'lista-geral.html'));
        // $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/lista-atividade'] = array('classe' => 'Atividade', 'metodo' => "renderizarHTML", 'parametro' => array('atividade', 'listar-atividade.html'));
        // $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/lista-chamada'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'listar-chamada.html'));
        // $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/afiliado/cadastrar'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'cadastrar-afiliado.html'));
        // $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/afiliado/sair'] = array('classe' => 'Login', 'metodo' => "Lougout", 'parametro' => array());
        
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
