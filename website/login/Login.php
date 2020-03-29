<?php

namespace website\classe;

require_once __DIR__.'/../global/Interface.php';
require_once __DIR__.'/../global/CRUD.php';

use Exception;
use CRUD;
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