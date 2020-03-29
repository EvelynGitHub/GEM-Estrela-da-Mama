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
                    $query = parent::$conn->query($select);
                    return $query->fetchAll(PDO::FETCH_ASSOC);
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
}

// if ($stmt->execute()) {
