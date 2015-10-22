<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 14/09/2015
 * Time: 14:25
 */
class Login{
    private $Level;
    private $Email;
    private $Senha;
    private $Erro;
    private $Result;

    function __construct($level){
        $this->Level = (int) $level;
    }

    public function ExeLogin(array $UserData){
        $this->Email = (string) strip_tags(trim($UserData['user']));
        $this->Senha = (string) strip_tags(trim($UserData['pass']));
        $this->setLogin();

    }
    private function setLogin(){
         if(!$this->Email || !$this->Senha || !Check::Email($this->Email) ):
             $this->Erro = "<script> alert('Infome seu E-mail e Senha Para logar no sistema'); </script>";
             $this->Result = false;
         elseif(!$this->getUser()):
             $this->Erro = "<script> alert('E-mail ou Senha Invalidos'); </script>";
             $this->Result = false;
       // elseif($this->Result['user_level'] < $this->Level):
       //      $this->Erro = "<script> alert('Desculpe mas você não tem permissão para acessar o sistema!'); </script>";
        //     $this->Result = false;
         else:
             $this->Execute();
             endif;
    }
    private function getUser(){
        $read = new Read();
        $read->ExeRead('pessoas', "WHERE email = :e AND senha = :p", "e={$this->Email}&p={$this->Senha}");
        if($read->getResult()){
            $this->Result = $read->getResult()[0];
            return true;
        }else{
            return false;
        }

    }
    private function Execute(){
        if(!session_id()):
            session_start();
            endif;
        $_SESSION['userlogin'] = $this->Result;
        $this->Erro = ["Olá {$this->Result['user_name']}, seja bem vindo(a). Aguarde redirecionamento!", WS_ACCEPT];
        $this->Result = true;

    }

    public  function CheckLogin(){
        if(empty($_SESSION['userlogin'])):
            unset($_SESSION['userlogin']);
        return false;
        else:
            return true;
            endif;

    }
    /**
     * @return mixed
     */
    public function getErro()
    {
        return $this->Erro;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->Result;
    }
}