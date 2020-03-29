<?php

namespace website\classe;

// interface IGlobal{
trait IGlobal
{


    public function rederizarTabela($matriz, $matrizExtra = [], $identificador = "")
    {

        if (count($matriz)) {
            $htmlTabela = "";
            $thead = "<thead>";
            $tbody = "<tbody>";

            $arrayExtra = [];
            $codigo = 0;
            //Inicio: Linha de cabeçalho da tabela
            $thead .= "<tr>";
            foreach ($matriz as $numero => $array) {
                foreach ($array as $titulo => $valor) {
                    $thead .= "<th> " . $titulo . " </th>";
                }
                break;
            }

            //Fim: Da linha de Cabeçalho da tabela

            //Inicio: linhas do corpo da tabela
            foreach ($matriz as $linha) {
                $tbody .= "<tr>";
                foreach ($linha as $coluna => $valor) {
                    $tbody .= "<td>";

                    if(array_key_exists($coluna, $matrizExtra))
                    {
                        $arrayExtra = $matrizExtra[$coluna];
                        $codigo = $valor;
                    }
                    
                    if(key($arrayExtra) == $coluna)
                    {
                        $tbody .= str_replace($identificador, $codigo, $arrayExtra[$coluna]);

                    }else{
                        $tbody .= $valor;
                    }
                    $tbody .= " </td>";
                }
                $tbody .= "</tr>";
            }
            $tbody .= "</tbody>";
            //Fim: do corpo da tabela

            $htmlTabela = "$thead $tbody";

            return $htmlTabela;
        }
        return "Desculpe, não encontramos dados";
    }

    public function renderizarHTML($pasta, $html)
    {
        include "website//$pasta//$html";
    }
}
