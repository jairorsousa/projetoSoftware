<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 08/10/2015
 * Time: 16:08
 */

include_once 'app/Config.inc.php';
class TrabalhoC{
    private $Cod;

    public  function ApTrabalho($Cod){

        $this->Cod = $Cod;
        $update = new Update();
        $Dados = [
            "status" => "A"
        ];
        $update->ExeUpdate('trabalhos', $Dados,"where codigo = :c", "c={$this->Cod}");
        if($update->getResult()){
            echo "<script>alert('Trabalho Aprovado Com Sucesso!');</script>";
            echo "<script>window.location.assign('painel/submetidos.php')</script>";
        }

    }
}