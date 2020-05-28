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
            //faço um select da tabela chamada
            $sql = "SELECT a.nm_afiliado 'Nome', a.nm_tipo_afiliado 'Tipo', c.qt_presencas 'Presença', c.qt_faltas 'Faltas',
                    ((c.qt_presencas)/((c.qt_presencas + c.qt_faltas)*100)) AS Frequencia
                    FROM afiliado a, chamada c
                    WHERE c.id_afiliado = a.cd_afiliado
                    ORDER BY ':order'";

            $preparaSql = array(':order' => "a.nm_afiliado");

            $banco = new CRUD();
            $matriz = $banco->obterRegistros($sql, $preparaSql);

            //$banco = new CRUD();
            //$matriz = $banco->obterRegistros($sql);

            echo $this->rederizarTabela($matriz);
        } catch (Exception $e) {
            echo "Erro ao listar a presença dos afiliados:" . $e;
        }
    }
    public function buscarPorNome($nome){

        $sql = "SELECT * FROM chamada WHERE `Nome:` = :nome";
        $preparaSql = array(':nome' => $nome);
        $banco = new CRUD();
        $matriz = $banco->obterRegistros($sql, $preparaSql);

		foreach($matriz as $afiliado){

			var_dump($afiliado);

		}
    }
}
if(isset($_POST['buscarPorNome'])){
	$afiliado = new Frequencia();
	$afiliado->buscarPorNome($_POST['pesquisa']);
}
