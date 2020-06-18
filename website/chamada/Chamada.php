<?php

namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;

class Chamada
{

    use IGlobal;

    private $atividade;
    private $afiliado;
    private $presenca;

    public function __construct($atividade = "", $afiliado = "", $presenca = "")
    {

        $this->atividade = $atividade;
        $this->afiliado = $afiliado;
        $this->presenca = $presenca;
    }

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

    public function adicionarPresenca($codigos)
    {

        $banco = new CRUD;

        $coluna = array('qt_presencas' => 1);

        foreach($codigos as $codigo){

            echo $banco->updateGenerico('chamada', $coluna, array('id_afiliado' => $codigo), '= qt_presencas +', 'Lista de Chamada Atualizada');

        }

    }
    public function removerPresenca(Afiliado $afiliado, Atividade $atividade)
    {
    }
    public function salvarChamada($chamada)
    {
    }
    public function editarListaChamada($chamada)
    {
    }

    public function listarAfiliadoChamada()
    {
        try {

            $sql = "SELECT a.cd_afiliado '#', a.nm_afiliado 'Nome', a.nm_tipo_afiliado 'Tipo', null 'Presença' 
                    FROM afiliado a
                    JOIN chamada c ON (a.cd_afiliado = c.id_afiliado)";


            $preparaSQL = "";

            $banco = new CRUD();

            if (isset($_GET['busca'])) {

                $nome = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : "";
                //var_dump("<h6>Verficando a varivael nome dentro do if</h6> ",$nome, "<br><br>");

                if ($nome) {

                    $sql .= "WHERE a.nm_afiliado LIKE :nome";
                    //var_dump("<h6>Verficando o select dentro do if</h6> ",$sql, "<br><br>");

                    $preparaSQL = array(':nome' => "%$nome%");
                    //var_dump("<h6>Verficando o preparaSQL dentro do if</h6> ",$preparaSQL, "<br><br>");
                }
            }

            $matriz = $banco->obterRegistros($sql, $preparaSQL);

            $htmlPresente['cd'] = array('Presença' => "<input class='chk' type='checkbox' name='afiliado[]' value='@codigo@'>");

            echo $this->rederizarTabela($matriz, $htmlPresente, "@codigo@");
        } catch (Exception $e) {
            echo "$e";
        }
    }

    public function listarAfiliado($idAtividade)
    {
        try {

            $sql = " SELECT cd, Nome, Tipo, Função, Status, Opção FROM vw_afiliado ";

            // $sqlPrepara = array(':codigo' => $idAtividade);

            $banco = new CRUD();

            $matriz = $banco->obterRegistros($sql);

            // unset($matriz['cd']);    

            $htmlPresente['#'] = array('Opção' => "<input class='option-input radio' type='radio' name='adicionar' id='' value='@codigoafiliado@'>");

            echo $this->rederizarTabela($matriz, $htmlPresente, '@codigoafiliado@');
        } catch (Exception $e) {
            echo "$e";
        }
    }
    
}

if(isset($_GET['chamada'])){

    $chamada = new Chamada;
    
    $listaCodigos = $_GET['afiliado'];

    $codigos = [];

    foreach($listaCodigos as $codigo){

        $codigos[] = intval($codigo);

    }

    $chamada->adicionarPresenca($codigos);

}