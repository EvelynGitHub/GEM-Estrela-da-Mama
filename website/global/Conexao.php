<?php

class Conexao
{
    protected static $conn;

    protected static function conectar()
    {
        DEFINE('HOST', 'mysql:host=host_aqui;dbname=nome_bd');
        DEFINE('USUARIO', 'user');
        DEFINE('SENHA', 'paws');

        try {
            if (!isset(self::$conn)) {
                $options = [
                    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                // Link de onde extrai a informação para a modificação
                // https://alexandrebbarbosa.wordpress.com/2019/06/21/phppdo-basico-o-que-se-precisa-saber-para-criar-um-crud/
                self::$conn = new PDO(HOST, USUARIO, SENHA, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                //self::$conn = new PDO(HOST, USUARIO, SENHA, $options);
            }
        } catch (PDOException $e) {
            echo 'Erro ' . $e->getCode() . ' de conexão: ' . $e->getMessage();
        }
        return self::$conn;
    }

    protected static function fecharConexao()
    {
        self::$conn = null;
    }
}
