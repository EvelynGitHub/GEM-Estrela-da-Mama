<?php

namespace website\classe;

class Afiliado {

    private static $pasta = "afiliado";
    private static $html = "lista-geral.html";
    
        
    public function getTelaPrincipalHTML()
    {
        $this->renderizarHTML("lista-geral.html");
    }
    public function renderizarHTML($ver){
        include "website//afiliado//$ver";
    }
}