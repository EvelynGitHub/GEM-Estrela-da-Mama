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
        $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/'] = array('classe' => 'Login', 'metodo' => "getTelaPrincipalHTML");
        $this->rotas['/Projetos/GEM/GEM-Estrela-da-Mama-2/lista-geral'] = array('classe' => 'Afiliado', 'metodo' => "getTelaPrincipalHTML");
        $this->rotas['/lista-atividade'] = array('classe' => 'Atividade', 'metodo' => "getTelaPrincipalHTML");
        $this->rotas['/lista-chamada'] = array('classe' => 'Chamada', 'metodo' => "getTelaPrincipalHTML");
        // $this->rotas['/Projetos/estrelas-da-mama-3.0/home'] = array('classe' => 'Afiliado', 'metodo' => "getTelaPrincipalHTML");
    }

    public function executar($url = null)
    {
        
        if (array_key_exists($url, $this->rotas)) {

            $classe = "\\website\\classe\\" . $this->rotas[$url]['classe'];
            $metodo = $this->rotas[$url]['metodo'];

            $obj = new $classe;
            $obj->$metodo();

        } else {
            echo "<br>A url Está correta?";
        }
    }

    public function getURL()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
