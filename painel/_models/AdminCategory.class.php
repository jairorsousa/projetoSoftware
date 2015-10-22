<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 14/09/2015
 * Time: 17:16
 */
class AdminCategory{
    private $Data;
    private $CatId;
    private $Error;
    private $Result;



    const Entity = 'ws_categories';

    public function ExeCreate(array $Data){
        $this->Data = $Data;
        if(in_array('', $this->Data)):
                $this->Result = false;
                $this->Error = ["<b>Erro ao cadastrar:</b> Para Cadastrar uma categoria, preencha todos os campos!", WS_ALERT];
        else:
            $this->setData();
            $this->setName();
          //  $this->Create();
        endif;
    }
    public function ExeUpdate(array $Data){
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar:</b> Para Cadastrar uma categoria, preencha todos os campos!", WS_ALERT];
        else:
            $this->setData();
            $this->setName();
            //  $this->Create();
        endif;
    }

    private function setData(){
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data =  array_map('trim', $this->Data);
        $this->Data['category_name'] =  Check::Name($this->Data['category_title']);
        $this->Data['category_date'] =  Check::Data($this->Data['category_date']);
        $this->Data['category_parent'] = ($this->Data['category_parent'] == 'null' ? null : $this->Data['category_parent']);
    }


    private function setName(){
        $Where = (!empty($this->CatId) ? "category_id != {$this->CatId} AND" : '');
        $categoria =  $this->Data['category_title'];
        $readName =  new Read();
        $readName->ExeRead(self::Entity, "WHERE {$Where} category_title = :t", "t={$this->Data['category_title']}");
        if($readName->getResult()) {
          $this->Error = ["<b>Erro ao Cadastrar:</b> Categoria ja está cadastrada", WS_ERROR];
        }
         // $Where = ( !empty($this->CatId) ? "category_id != {$this->CatId} AND" : '');
         //$readName = new Read;
         //$readName->ExeRead(self::Entity, "{$Where} category_title = :t", "t={$this->Data['category_title']}");
         //if($this->getResult()):
          //  $this->Data['category_name'] = $this->Data['category_name']. '-' . $readName->getRowCount();
           //endif;
        else{
            $this->Create();
        }
    }

    public function Create(){
        $Create =  new Create;
        $Create->ExeCreate(self::Entity, $this->Data);
        if($Create->getResult()):
            $this->Result = $Create->getResult();
            $this->Error = ["<b>Sucesso:</b> A categoria {$this->Data['category_title']} foi cadastrada no sistema!", WS_ACCEPT];
        endif;
    }
    // getters e setters
    public function getError()
    {
        return $this->Error;
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