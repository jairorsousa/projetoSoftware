<?php
$totalPalestrantes = Totais::Palestrante();
$totalAlunos = Totais::Alunos();
$totalPalestras = Totais::Palestras();
$totalMiniCurso = Totais::MiniCurso();
$totalBanners = Totais::Banners();
$trabalhos = Totais::Trabalhos();
$idpalestrante = $userlogin['codigo'];
$statustra = new Read();
$statustra->FullRead("SELECT trabalhos.status
FROM autor_trabalho
INNER JOIN pessoas ON autor_trabalho.codigo_autor = pessoas.codigo
INNER JOIN trabalhos ON autor_trabalho.codigo_trabalho = trabalhos.codigo
WHERE  pessoas.codigo = {$idpalestrante}");
foreach($statustra->getResult() as $cat):
    extract($cat);
   if($status == 'N'){
       $resultado = 'Seu Trabalho esta sendo avaliado';
   }elseif($status == 'R'){
       $resultado = 'Seu Trabalho não foi Aprovado';
   }else{
       $resultado = 'Parabéns seu Trabalho foi Aprovado';
   }
endforeach;

?>
<style>
    #box{
        position: absolute;
        right: 15px;
        top: 50px;
        width: 82%;
        height: auto;
    }
    .info{
        width: 400px;
        float: left;
        margin-left: 30%;
        margin-bottom: 10px;
        background: #fff;
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px#888;
        box-shadow: 0 0 5px #888;

    }
    .info p{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .total{
        font-size: 30px;
        color:#1C3D50;
    }
    #border{
        border-left: 2px solid #ccc;
        float: left;
        height: 50px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 10px;
        width: 5px;
        text-indent: 9999px;
    }
    .submetidos{
        width: 200px;
        float: left;
        margin-right: 10px;
        background: #fff;
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px#888;
        box-shadow: 0 0 5px #888;
    }


</style>

<section class="navegacao-nome">
    <p> Navegação</p>
</section>
<section class="navegacao">
    <p><i class="fa fa-building"></i> Painel</p>
</section>
<section class="navegacao">
    <p><i class="fa fa-street-view"></i>Perfil</p>
</section>
<section  class="navegacao">
    <p><i class="fa fa-file-text"></i>Trabalhos</p>
</section>
<section class="navegacao">
    <p><i class="fa fa-users"></i>Alunos</p>
</section>
<section class="navegacao">
    <p> <i class="fa fa-power-off"></i>Sair</p>
</section>

</section>



<section id="box">
    <section class="info">

        <p align="center"><?=$resultado?></p>


</section>
    </section>


