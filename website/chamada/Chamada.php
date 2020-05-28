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

    public function adicionarPresenca(Afiliado $afiliado, Atividade $atividade)
    {
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

            $sql = "SELECT a.nm_afiliado 'Nome', a.nm_tipo_afiliado 'Tipo', null 'Frequencia' ,null 'Presença' 
                    FROM afiliado a, chamada c 
                    WHERE c.id_afiliado = a.cd_afiliado
                    ORDER BY ':order'";


            $preparaSQL = array(':order' => "a.nm_afiliado");

            $banco = new CRUD();

            $matriz = $banco->obterRegistros($sql, $preparaSQL);

            $htmlPresente['Nome'] = array('Presença' => "<input class='chk' type='checkbox' name='afiliado' value='@codigo@'>");

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

            $htmlPresente['cd'] = array('Opção' => "<input class='option-input radio' type='radio' name='adicionar' id='' value='@codigoafiliado@'>");

            echo $this->rederizarTabela($matriz, $htmlPresente, '@codigoafiliado@');
        } catch (Exception $e) {
            echo "$e";
        }
    }
}
