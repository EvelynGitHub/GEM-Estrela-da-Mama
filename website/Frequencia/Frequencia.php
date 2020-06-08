<?php

namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;

class Frequencia
{

    use IGlobal;

    public function __get($atributo)
    {
        if (!property_exists($this, $atributo)) {
            throw new Exception("Atributo {$atributo} não existe nessa classe");
        }

        return $this->{$atributo};
    }

    public function __set($atributo, $valor)
    {

        if (!property_exists($this, $atributo)) {
            throw new Exception("Atributo {$atributo} não existe nessa classe");
        }

        $this->{$atributo} = $valor;
    }

    public function visualizarFrequencia()
    {

        try {
            $sql = "SELECT a.cd_afiliado '#', a.nm_afiliado 'Nome', a.nm_tipo_afiliado 'Tipo', c.qt_presencas 'Presença',
            CONCAT(FORMAT((((c.qt_presencas)/365)*100), 2), '%') AS 'Frequência', null 'Marcar'
            FROM afiliado a
            JOIN chamada c ON (a.cd_afiliado = c.id_afiliado) ";
    //var_dump("<h6>Verficando o select antes do if</h6> ",$sql, "<br><br>");

    $preparaSQL = "";
    //var_dump("<h6>Verficando o preparaSQL antes do if</h6> ",$preparaSQL, "<br><br>");

    $banco = new CRUD();

    if (isset($_GET['busca'])) {

        $nome = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : "";
        //var_dump("<h6>Verficando a varivael nome dentro do if</h6> ",$nome, "<br><br>");

        if ($nome != "") {

            $sql .= "WHERE a.nm_afiliado LIKE :nome";
            //var_dump("<h6>Verficando o select dentro do if</h6> ",$sql, "<br><br>");

            $preparaSQL = array(':nome' => "%$nome%");
            //var_dump("<h6>Verficando o preparaSQL dentro do if</h6> ",$preparaSQL, "<br><br>");
        }
    }

    $matriz = $banco->obterRegistros($sql, $preparaSQL);
    //var_dump("<h6>Verficando o que a matriz esta passando</h6> ",$matriz, "<br>");

    $htmlPresente['#'] = array('Marcar' => "<input class='chk' type='checkbox' name='afiliado[]' value='@codigo@'>");
    echo $this->rederizarTabela($matriz, $htmlPresente, "@codigo@");

        } catch (Exception $e) {
            echo "Erro ao listar a presença dos afiliados:" . $e;
        }
    }
    
}
if(isset($_GET['finalizaChamada'])){

    $chamada = new Chamada;
    
    $listaCodigos = $_GET['afiliado'];

    $codigos = [];

    foreach($listaCodigos as $codigo){

        $codigos[] = intval($codigo);

    }
    $chamada->adicionarPresenca($codigos);
    
}