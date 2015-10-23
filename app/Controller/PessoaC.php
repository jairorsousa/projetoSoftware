<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 08/10/2015
 * Time: 16:16
 */
include_once 'app/Config.inc.php';

class PessoaC{
    private $id;
    private $idT;
    private $dados;
    private $LinkAnexo;

    public  function index(){
        include_once 'app/View/header.php';
        include_once 'app/View/form-palestrante.php';
        include_once 'app/View/footer.php';

    }
    public function Pegar(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $delUltimo = array_pop($this->dados);


        $pessoa = new Pessoa();
        $pessoa->ExeCreate($this->dados);
        if($pessoa->getResult()){
            $this->id = $pessoa->getResult();
            echo "<script>window.location.assign('http://http://www.profile.vc/sigea/p.php?c=PessoaC&m=Trabalho&p=$this->id')</script>";
        }else{
            echo $pessoa->getMsg();

            echo "<script>window.location.assign('http://http://www.profile.vc/sigea/s.php?c=PessoaC&m=index')</script>";
        }
    }

    public function Trabalho($parametro){
        include_once 'app/View/header.php';
        $tipoAtividade = new Read();
        $tipoAtividade->ExeRead('tipo_atividades');

        include_once 'app/View/form-trabalho.php';
        $parametro = $parametro;



include_once 'app/View/footer.php';
    }

    public function GravarTrabalho(){

       $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


        if(isset($_FILES['fileUpload']))
        {
            $nome = $this->dados['titulo'];
            $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
            $new_name =  $nome . $ext; //Definindo um novo nome para o arquivo
            $this->LinkAnexo = $new_name;
            $dir = 'uploads/'; //Diretório para uploads
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

        }else{
            echo "<script>alert('nao foi possivel anexar o arquivo!');</script>";
        }

        if($this->dados['tipoAtividade'] == "Palestra"){
            $tipoA = 1;
        }elseif($this->dados['tipoAtividade'] == "MiniCurso"){
            $tipoA = 2;
        }else{
            $tipoA = 3;
        }
        //atualiza pessoa

        $updateP = new Update();
        $dadosUp = [
            "curriculo" => $this->dados['perfil'],
            "nivel" => 1,
            "senha" => $this->dados['senha']
        ];
        $updateP->ExeUpdate('pessoas',$dadosUp, "where codigo = :id","id={$this->dados['idPes']}");


        //cadastra Trabalho
        $cadastrarT= new Create();
        $Dados = [
           "resumo" => $this->dados['resumo'],
           "data_submetido" => date("Y-m-d"),
           "tipo_atividade" => $tipoA,
           "anexo" => $this->LinkAnexo,
           "status" => "N",
            "titulo" => $this->dados['titulo']
        ];
        $cadastrarT->ExeCreate('trabalhos', $Dados);
          $this->idT = $cadastrarT->getResult();

        // Vincula o auto trabalho

        $cadastraAT =  new Create();
        $DadosAT =[
            "codigo_trabalho" => (int) $this->idT,
            "codigo_autor" => (int) $this->dados['idPes'],
            "codigo_evento" => 1
        ];

        $cadastraAT->ExeCreate('autor_trabalho', $DadosAT);

        echo "<script>alert('Seu trabalho foi submetido com sucesso. Aguarde nosso contato');</script>";
        echo "<script>window.location.assign('http://www.profile.vc/sigea')</script>";


    }
}