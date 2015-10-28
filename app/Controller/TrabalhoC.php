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

        // pega dados da pessoa
        $pessoa= new Read();
        $pessoa->ExeRead('pessoas', "where codigo = :id", "id={$this->dados['idPes']}");
        foreach($pessoa->getResult() as $resulPes){
            extract($resulPes);
            //Enviar o Email.
            $enviarEmail = new Email();
            $DadosEmail = [
                "Assunto" => "Confirmação da Submição de Trabalho DeepDay",
                "Mensagem" => "Seu Trabalho foi submetido com sucesso.",
                "RemetenteNome" => "Equipe DeepDay",
                "RemetenteEmail" => "atendimento@deepday.com.br",
                "DestinoNome" => $nome,
                "DestinoEmail" => $email
            ];
            $enviarEmail->Enviar($DadosEmail) ;
        }


        echo "<script>alert('Seu trabalho foi submetido com sucesso!');</script>";
        echo "<script>window.location.assign('".BASE."/painel')</script>";


    }


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
    public  function ReTrabalho($Cod){

        $this->Cod = $Cod;
        $update = new Update();
        $Dados = [
            "status" => "R"
        ];
        $update->ExeUpdate('trabalhos', $Dados,"where codigo = :c", "c={$this->Cod}");
        if($update->getResult()){
            echo "<script>alert('Trabalho Reprovado Com Sucesso!');</script>";
            echo "<script>window.location.assign('painel/submetidos.php')</script>";
        }

    }
}