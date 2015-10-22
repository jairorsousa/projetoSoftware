<?php
/**
 * Created by PhpStorm.
 * User: Jairo
 * Date: 07/10/2015
 * Time: 00:33
 */
include_once 'app/Config.inc.php';
class Palestrante{

     private $dados;

    public  function index(){
       include_once 'app/View/header.php';
       include_once 'app/View/form-palestrante.php';
        if(isset($_POST['enviar'])){
            $this->Pegar();
        }

        include_once 'app/View/footer.php';

    }
    public function Pegar(){
          $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
           $delUltimo = array_pop($this->dados);
          $palestrante =  new PalestranteM();
        // $palestrante->Inserir($this->dados);
         var_dump($palestrante->Inserir($this->dados));




    }
    public function Trabalhos(){
        include_once 'app/View/header.php';
        echo 'trabalhos';
        include_once 'app/View/footer.php';


    }

}