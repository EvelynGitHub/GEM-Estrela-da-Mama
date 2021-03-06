<?php

namespace website\classe;

require_once __DIR__ . '/../global/Interface.php';
require_once __DIR__ . '/../global/CRUD.php';

use Exception;
use CRUD;

class Atividade
{

    use IGlobal;

    private $nomeAtividade;
    private $horaAtividade;
    private $date;
    private $afiliado;
    private $quantidadeAulas;
    private $tabela = 'atividade';

    public function __construct($nomeAtividade = "", $horaAtividade = "", $date = "", $afiliado = "", $quantidadeAulas = "")
    {


        $this->nomeAtividade = $nomeAtividade;
        $this->horaAtividade = $horaAtividade;
        $this->date = $date;
        $this->afiliado = $afiliado;
        $this->quantidadeAulas = $quantidadeAulas;
    }

   


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

    public function criarAtividade($atividade)
    {

        if ($this->verificarCamposNulosAtividade()) {

            $crud = new CRUD();

            $arrayValores = array(
                'nm_atividade' => $atividade->nomeAtividade,
                'dt_atividade' => $atividade->date,
                'hr_hora' => $atividade->horaAtividade
            );

            $crud->inserirGenerico($this->tabela, $arrayValores);
        }else{
            echo "Preencha todos os campos";
        }
    }
    public function editarAtividade($atividade)
    {
    }
    public function excluirAtividade($atividade)
    {
    }
    public function listarAtividades()
    {
        $sql = " SELECT cd_atividade,nm_atividade  FROM atividade ";
       
			$banco = new CRUD();
            $matriz = $banco->obterRegistros($sql);
            
                //while($teste = mysqli_fetch_assoc($matriz))
                //var_dump($matriz);
                //$pegaValor[] = mysqli_fetch_assoc($matriz);
                //var_dump($pegaValor);
                foreach($matriz as $valor){
                   //foreach($valor as $pegaValor){
                       //var_dump($valor['cd_atividade']);
                       //var_dump($valor['nm_atividade']);
                       echo "<br>";
                       echo "<a href='/chamada/lista-chamada?idAtividade=".$valor['cd_atividade']."' class='ver-atividade'>".$valor['nm_atividade']."</a>";
                  // }
                }
                //FEITO COM SUCESSO
                 
            

           
    }
    public function adicionarAfiliado($afiliado)
    {
    }
    public function removerAfiliado($afiliado)
    {
    }
    private function verificatAtividadeExiste($atividade)
    {
    }
    private function verificarCamposNulosAtividade()
    {
        if ($this->nomeAtividade == null && $this->horaAtividade == null && $this->date == null) {
            return false;
        }
        return true;
    }
}

if (isset($_POST['btn-cadastrar'])) {

    $atividade = new Atividade();

    try {
        $atividade->nomeAtividade = $_POST['name'];
        $atividade->horaAtividade = $_POST['horario'];
        $atividade->date = $_POST['data'];

        $atividade->criarAtividade($atividade);
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
