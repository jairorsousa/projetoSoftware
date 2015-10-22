<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 08/10/2015
 * Time: 16:08
 */

class Trabalhos{
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
            echo "<script>window.location.assign('www.cliqueplay.com.br/sigea/painel/submetidos.php')</script>";
        }

    }
}