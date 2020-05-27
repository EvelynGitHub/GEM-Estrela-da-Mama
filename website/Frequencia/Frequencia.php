<?php

namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;

class Frequencia{

    use IGlobal;
    
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
            echo "Erro ao listar a presença dos afiliados:".$e;
        }
    }
}