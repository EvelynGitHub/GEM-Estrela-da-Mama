<?php

namespace website\classe;

class Atividade {



        
    public function getTelaPrincipalHTML()
    {
        $this->renderizarHTML("listar-atividade.html");
    }
    public function renderizarHTML($ver){
        include "website//atividade//$ver";
    }
    
}