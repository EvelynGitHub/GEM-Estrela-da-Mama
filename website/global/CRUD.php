<?php

use function PHPSTORM_META\type;

require_once __DIR__ . '/Conexao.php';

//use Conexao; // Pode dar ERRO por causa desse use ou faltar o requeri

class CRUD extends Conexao
{

    public function __construct()
    {
        $this->conectar();
        // parent::conectar();
    }

    public function obterRegistros($select, $preparaSelect = array())
    {
        try {

            if (empty($preparaSelect)) {
                if (preg_match("/WHERE/", $select)) {
                    echo '<br>Está instrução é um <b>select complexo</b>, portanto devesse usar o seundo parametro desta função! <br>';
                    return array();
                } else {
                    $query = parent::$conn->prepare($select);
                    if ($query->execute()) {
                        return $query->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        echo "<br>Não foi possível executar está instrução <b>select</b>,<br>
                                 por favor, verifique se existem dados para serem selecionados. <br>";
                        return array();
                    }
                }
            } else {
                $instrucao = parent::$conn->prepare($select);

                foreach ($preparaSelect as $key => $value) {
                    $instrucao->bindParam($key, $value);
                }

                if ($instrucao->execute()) {
                    return $instrucao->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    echo "<br>Não foi possível executar está instrução <b>select</b>, por favor, verifique a escreita. <br>";
                    return array();
                }
            }
        } catch (PDOException $e) {
            return "O seguinte erro foi encontrado ao executar esse select: <br> $e->getMessage ";
        }
    }

    public function inserir($tabela, $valores)
    {
        //Colocar verificações aqui
        $sql = "INSERT INTO $tabela VALUES (? "; //O primeiro é sempre o auto_increment
        for ($x = 1; $x < count($valores); $x++) {
            $sql .= ",?";
        }
        $sql .= ")";

        $instrucao = parent::$conn->prepare($sql);

        foreach ($valores as $key => $value) {
            $instrucao->bindParam($key, $value);
        }

        if ($instrucao->execute()) {
            return "<br>Cadastro realizado com sucesso<br>";
        } else {
            return "<br>Não foi possível efetuar o cadastro<br>";
        }
    }

    public function excluir($tabela, $id)
    {
        //Colocar verificações aqui
        $sql = "DELETE FROM $tabela WHERE " . $id[0] . "=:id";

        $instrucao = parent::$conn->prepare($sql);
        $instrucao->bindParam(":id", $id[1]);

        if ($instrucao->execute()) {
            return "<br>Excluido com sucesso<br>";
        } else {
            return "<br>Não foi possível excluir<br>";
        }
    }
}

// if ($stmt->execute()) {
