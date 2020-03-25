<?php

namespace website\classe;

require_once("website/global/Conexao.php");

class Login {
    
    
    
    public function getTelaPrincipalHTML()
    {
        $this->renderizarHTML("login.html");
    }
    public function renderizarHTML($ver){
        include "website//login//$ver";
    }
    
}