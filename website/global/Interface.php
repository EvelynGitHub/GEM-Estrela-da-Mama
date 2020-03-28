<?php

namespace website\classe;

// interface IGlobal{
trait IGlobal
{


    public function rederizarTabela($matriz)
    {
        if (count($matriz)) {
            $htmlTabela = "";
            $thead = "<thead>";
            $tbody = "<tbody>";

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
                foreach ($linha as $coluna) {
                    $tbody .= "<td>$coluna</td>";
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

    public function rederizarHTML($pasta, $html)
    {
        include "website//$pasta//$html";
    }
}
