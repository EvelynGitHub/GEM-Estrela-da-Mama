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
            $sql = "SELECT a.nm_afiliado 'Nome', a.nm_tipo_afiliado 'Tipo', c.qt_presencas 'Presença', c.qt_faltas 'Faltas',
                    CONCAT(FORMAT((((c.qt_presencas)/(c.qt_presencas + c.qt_faltas))*100), 2), '%') AS 'Frequência'
                    FROM afiliado a, chamada c
                    WHERE c.id_afiliado = a.cd_afiliado
                    ORDER BY ':order'";

            $preparaSql = array(':order' => "a.nm_afiliado");

            $banco = new CRUD();
            $matriz = $banco->obterRegistros($sql, $preparaSql);

            echo $this->rederizarTabela($matriz);
        } catch (Exception $e) {
            echo "Erro ao listar a presença dos afiliados:" . $e;
        }
    }
    public function buscarPorNome($nome)
    {
        try {
            //var_dump($nome);
            $sql = "SELECT a.nm_afiliado 'Nome', a.nm_tipo_afiliado 'Tipo', c.qt_presencas 'Presença', c.qt_faltas 'Faltas',
                    CONCAT(FORMAT((((c.qt_presencas)/(c.qt_presencas + c.qt_faltas))*100), 2), '%') AS 'Frequência'
                    FROM afiliado a, chamada c
                    WHERE c.id_afiliado = a.cd_afiliado
                    AND a.nm_afiliado LIKE '%" . $nome . "%'
                    ORDER BY ':order'";

            $preparaSql = array(':order' => "a.nm_afiliado");
            $banco = new CRUD();
            $matriz = $banco->obterRegistros($sql, $preparaSql);

            //var_dump($matriz);
            echo $this->rederizarTabela($matriz);
        } catch (Exception $e) {
            echo "Erro ao listar" . $e;
        }
    }
}
if (isset($_GET['busca'])) {
    $freq = new Frequencia();
    $freq->buscarPorNome($_GET['pesquisa']);
}
