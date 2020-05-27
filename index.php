<?php

include 'website//afiliado//Afiliado.php';
include 'website//atividade//Atividade.php';
include 'website//chamada//Chamada.php';
include 'website//login//Login.php';
// include 'website//lista-geral//.php';
include 'website//administrador//Administrador.php';


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
        $this->rotas['/lista-chamada'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'listar-chamada.html'));
        $this->rotas['/afiliado/cadastrar'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'cadastrar-afiliado.html'));
        $this->rotas['/afiliado/editar'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'editar-afiliado.html'));
        $this->rotas['/atividade/cadastrar'] = array('classe' => 'Atividade', 'metodo' => "renderizarHTML", 'parametro' => array('atividade', 'cadastrar-atividade.html'));
        $this->rotas['/atividade/listar-atividade'] = array('classe' => 'Atividade', 'metodo' => "renderizarHTML", 'parametro' => array('atividade', 'listar-atividade.html'));
        $this->rotas['/chamada/listar-chamada'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'listar-chamada.html'));
        $this->rotas['/chamada/editar-afiliado'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'editar-chamada.html'));
        $this->rotas['/afiliado/sair'] = array('classe' => 'Login', 'metodo' => "Lougout", 'parametro' => array());
        $this->rotas['/administrador/cadastrar-administrador'] = array('classe' => 'Administrador', 'metodo' =>"renderizarHTML",'parametro' => array('administrador', 'cadastrar-administrador.html'));
        $this->rotas['/frequencia/vizualizar-frequencia'] = array('classe' => 'Frequencia', 'metodo' => "renderizarHTML", 'parametro' => array('Frequencia', 'vizualizar-frequencia.html'));


        //Rotas do localhost (desenvolvimento)/Projetos/GEM/GEM-Estrela-da-Mama-2/
        /*$this->rotas['/GEM-Estrela-da-mama/'] = array('classe' => 'Login', 'metodo' => "renderizarHTML", 'parametro' => array('login', 'login.html'));
        $this->rotas['/GEM-Estrela-da-mama/lista-geral'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'lista-geral.html'));
        $this->rotas['/GEM-Estrela-da-mama/lista-chamada'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'listar-chamada.html'));
        $this->rotas['/GEM-Estrela-da-mama/afiliado/cadastrar'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'cadastrar-afiliado.html'));
        $this->rotas['/GEM-Estrela-da-mama/afiliado/editar'] = array('classe' => 'Afiliado', 'metodo' => "renderizarHTML", 'parametro' => array('afiliado', 'editar-afiliado.html'));
        $this->rotas['/GEM-Estrela-da-mama/atividade/cadastrar'] = array('classe' => 'Atividade', 'metodo' => "renderizarHTML", 'parametro' => array('atividade', 'cadastrar-atividade.html'));
        $this->rotas['/GEM-Estrela-da-mama/atividade/listar-atividade'] = array('classe' => 'Atividade', 'metodo' => "renderizarHTML", 'parametro' => array('atividade', 'listar-atividade.html'));
        $this->rotas['/GEM-Estrela-da-mama/chamada/listar-chamada'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'listar-chamada.html'));
        $this->rotas['/GEM-Estrela-da-mama/chamada/editar-afiliado'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'editar-chamada.html'));
        $this->rotas['/GEM-Estrela-da-mama/afiliado/sair'] = array('classe' => 'Login', 'metodo' => "Lougout", 'parametro' => array());
        $this->rotas['/GEM-Estrela-da-mama/administrador/cadastrar-administrador'] = array('classe' => 'Administrador', 'metodo' => "renderizarHTML", 'parametro' => array('administrador', 'cadastrar-administrador.html'));
        $this->rotas['/GEM-Estrela-da-mama/chamada/vizualizar-frequencia'] = array('classe' => 'Chamada', 'metodo' => "renderizarHTML", 'parametro' => array('chamada', 'vizualizar-frequencia.html'));*/
    }

    public function executar($url = null)
    {
        try {
            if (!isset($_SESSION['usuario']) && $url != "/") {
                // echo "Não tem SESSION ".session_status();
                header("Location: /");
            }

            if(isset($_SESSION['usuario']) && $url == "/"){
                $url = "/lista-geral";
            }
    
            if (array_key_exists($url, $this->rotas)) {

                $classe = "\\website\\classe\\" . $this->rotas[$url]['classe'];
                $metodo = $this->rotas[$url]['metodo'];
                $parametro = $this->rotas[$url]['parametro'];

                $obj = new $classe;
                call_user_func_array(array($obj, $metodo), $parametro);

                $obj = null;
            } else {
                echo "<br>A url Está correta?";
            }
        } catch (Exception $e) {
            echo "Não foi possível acessar está rota.<br> <b>Erro retornado:</b> $e->getMessage()";
        }
    }

    public function getURL()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
