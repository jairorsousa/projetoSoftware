<?php
/**
 * Created by PhpStorm.
 * User: Jairo
 * Date: 08/10/2015
 * Time: 23:40
 */
class TipoAtividade{
    private $Data;
    private $CatId;
    private $Msg;
    private $Result;



    const Entity = 'tipo_atividade';

    public function ExeCreate(array $Data){

        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Msg = "<script>alert('Informe todos os Campos');</script>";

        else:
            $this->Create();
        endif;
    }
    public function ExeUpdate(array $Data){

    }



    private function Create(){
        $Create =  new Create;
        $Create->ExeCreate(self::Entity, $this->Data);
        if($Create->getResult()):
            $this->Result = $Create->getResult();
            $this->Msg = "<script>alert('Sucesso');</script>";

        endif;
    }
    // getters e setters
    public function getMsg()
    {
        return $this->Msg;
    }
    public function setError($Error)
    {
        $this->Error = $Error;
    }
    public function getResult()
    {
        return $this->Result;
    }
    public function setResult($Result)
    {
        $this->Result = $Result;
    }


}