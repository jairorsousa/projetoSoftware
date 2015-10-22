<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 08/10/2015
 * Time: 16:08
 */
//include_once 'app/Config.inc.php';
class Pessoa{
    private $Data;
    private $CatId;
    private $Msg;
    private $Result;



    const Entity = 'pessoas';

    public function ExeCreate(array $Data){

      $this->Data = $Data;
       if(in_array('', $this->Data)):
           $this->Result = false;
           $this->Msg = "<script>alert('Informe todos os Campos');</script>";

       else:
           $this->setData();
           $this->setName();
           //  $this->Create();
       endif;
    }
    public function ExeUpdate(array $Data){

    }

    private function setData(){
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data =  array_map('trim', $this->Data);
        $this->Data['cpf'] = Check::soNumero($this->Data['cpf']);
        }


    private function setName(){
          $email = $this->Data['email'];
           $readName =  new Read();
        $readName->ExeRead(self::Entity, "WHERE cpf = {$this->Data['cpf']} or email = '$email'");
        if($readName->getResult()) {
            $this->Msg = "<script>alert('Ja possui Cadastrado em Nosso Sitema!');</script>";

        }

        else{
            $this->Create();
        }
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