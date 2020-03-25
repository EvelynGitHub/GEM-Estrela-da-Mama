<?php

namespace website\classe;

class Afiliado {
    
        
    public function getTelaPrincipalHTML()
    {
        $this->renderizarHTML("lista-geral.html");
    }
    public function renderizarHTML($ver){
        include "website//afiliado//$ver";
    }
}