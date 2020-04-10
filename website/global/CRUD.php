<?php

use function PHPSTORM_META\type;

require_once __DIR__ . '/Conexao.php';

//use Conexao; // Pode dar ERRO por causa desse use ou faltar o requeri

class CRUD extends Conexao
{

    public function __construct()
    {
        if (parent::$conn == null) {
            $this->conectar();
            // parent::conectar();
        }
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
                        $retorno =  $query->fetchAll(PDO::FETCH_ASSOC);
                        $this->fecharConexao();
                        return $retorno;
                    } else {
                        echo "<br>Não foi possível executar está instrução <b>select</b>,<br>
                                 por favor, verifique se existem dados para serem selecionados. <br>";
                        return array();
                    }
                }
            } else {
                $instrucao = parent::$conn->prepare($select);

                foreach ($preparaSelect as $key => $value) {
                    // echo "<br>Chave:> $key <br> Valor:> $value";
                    // Troque de bindParan Para bindValue, aparentemente bindParan estava sobrescrevendo valores
                    $instrucao->bindValue($key, $value);
                }

                if ($instrucao->execute()) {
                    $retorno = $instrucao->fetchAll(PDO::FETCH_ASSOC);
                    $this->fecharConexao();
                    return $retorno;
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

    /** Método genêrico que realiza o insert na banco de dados
     * @param $tabela : é o nome da tabela na qual deseja realizar a inserção dos dados
     * @param $valores : array() no qual devesse especificar qual coluna deve receber determinado valor
     * Exemplo: array = array('nm_login' => 'nome@gmail.com', 'nm_senha'=>'123456');
     * inserir('login', array);
     */
    public function inserirGenerica($tabela, $valores)
    {
        try {
            $sql = "";
            $colunas = "";
            $substituir_valores = "";

            foreach ($valores as $key => $value) {
                $colunas .= "$key, ";
                $substituir_valores .= ":$key, ";
            }
            // Remove a última , de $colunas
            $colunas = substr($colunas, 0, 2);
            // Remove a última , de $substituir_valores
            $substituir_valores = substr($colunas, 0, 2);

            // Exemplo de como fica o sql tratado
            // "INSERT INTO login (nm_login, nm_senha) VALUES (:nm_login, :nm_senha)";
            $sql = "INSERT INTO $tabela ($colunas) VALUES ($substituir_valores)";

            $instrucao = parent::$conn->prepare($sql);

            foreach ($valores as $key => $value) {
                $instrucao->bindParam((":$key"), $value);
            }

            if ($instrucao->execute()) {
                return "<br>Cadastro realizado com sucesso<br>";
            } else {
                return "<br>Não foi possível efetuar o cadastro<br>";
            }

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            exit;
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
