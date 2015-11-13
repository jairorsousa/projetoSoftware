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
if($statustra->getRowCount() != 0){
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
}else{
    $resultado = 'Você Ainda não Submeteu Trabalho';
}


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
    .info p, .frente p{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .frente{
        width: 600px;
        float: left;
        margin-left: 22%;
        margin-bottom: 10px;
        background: #fff;
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px#888;
        box-shadow: 0 0 5px #888;

    }
    .frente form{
        width: 400px;
        float: left;
        margin-left: 30%;
        margin-bottom: auto;
    }

</style>

<section class="navegacao-nome">
    <p> Navegação</p>
</section>
<section onclick="window.location.assign('painel.php')" class="navegacao">
    <p><i class="fa fa-building"></i> Painel</p>
</section>
<section onclick="loadPerfil()" class="navegacao">
    <p><i class="fa fa-street-view"></i>Perfil</p>
</section>
<section onclick="loadInscricao()" class="navegacao">
    <p><i class="fa fa-file-text"></i>Minhas Inscrição</p>
</section>
<section onclick="loadAluno()" class="navegacao">
    <p><i class="fa fa-users"></i>Certificado</p>
</section>
<section class="navegacao">
    <p> <i class="fa fa-power-off"></i>Sair</p>
</section>

</section>



<section id="box">
    <section class="frente">

        <p align="center"><b>Selecione seu Pacote</b></p>
        <form action="">
            <input type="radio" name="pacote" value="male">primeiro pacote que nao lebmro<br>
            <input type="radio" name="sex" value="female">Segundo pacote que nao lembro
        </form>


</section>


    </section>
<script>
    function loadTrabalho() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("box").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "loadAjax/trabalho.php", true);
        xhttp.send();
    }
    function loadAluno() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("box").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "loadAjax/certificado.php");
        xhttp.send();
    }
    function loadInscricao() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("box").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "loadAjax/inscricao.php");
        xhttp.send();
    }
    function loadPerfil() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("box").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "loadAjax/perfil.php");
        xhttp.send();
    }
</script>


