<?php

namespace website\classe;

//require_once("website/global/Conexao.php");
require_once __DIR__.'/../global/Interface.php';
class Login {
    
    use IGlobal;
    
    public function getTelaPrincipalHTML()
    {
        $this->renderizarHTML("login.html");
    }
    public function renderizarHTML($ver){
        include "website//login//$ver";
    }
    
}