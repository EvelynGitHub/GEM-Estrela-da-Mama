<?php

namespace website\classe;

class Chamada {





        
    public function getTelaPrincipalHTML()
    {
        $this->renderizarHTML("listar-chamada.html");
    }
    public function renderizarHTML($ver){
        include "website//chamada//$ver";
    }

}