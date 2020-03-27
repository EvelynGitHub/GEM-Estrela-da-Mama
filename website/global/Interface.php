<?php

namespace website\classe;

// interface IGlobal{
trait IGlobal{


    public function rederizarTabela($thead=[], $tbody=[]){
        $htmlTabela =" <thead><tr>";
        foreach($thead as $cabecalho){
            $htmlTabela .="<th>$cabecalho</th>";
        }
        $htmlTabela .="</tr></thead>";
        $htmlTabela .="<tbody>";
        foreach($tbody as $linha){
            $htmlTabela .="<tr>";
            foreach($linha as $coluna){
                $htmlTabela .="<td>$coluna</td>";
            }
            $htmlTabela .="</tr>";
        }
        $htmlTabela .="</tbody>";

        return $htmlTabela;
    }

    public function rederizarHTML($pasta, $html){
        include "website//$pasta//$html";
    }
}