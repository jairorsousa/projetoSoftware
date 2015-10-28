<?php
session_start();
require('../app/Config.inc.php');
$login = new Login(3);
$logoff = filter_input(INPUT_GET,'logoff',FILTER_VALIDATE_BOOLEAN);
$getexe = filter_input(INPUT_GET,'exe',FILTER_DEFAULT);

if(!$login->CheckLogin()):
    unset($_SESSION['userlogin']);
    header('Location: index.php?exe=restrito');
else:
    $userlogin = $_SESSION['userlogin'];
endif;
if($logoff):
    unset($_SESSION['userlogin']);
    header('Location: index.php?exe=logoff');
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>SIGEA | Painel</title>
    <!--[if lt IE 9]>
    <script src="../_cdn/html5.js"></script>
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

</head>

<body>
<header>
    <h1 class="logomarca">SIGEA | Deep Day</h1>
    <ul class="systema_nav radius">
        <li><a class="icon logout radius" href="painel.php?logoff=true">Sair&nbsp; <i class="fa fa-power-off"></i></a></li>
    </ul>

</header>
<section id="navegacao">
    <section class="usuario">
        <img src="../img/perfil.png">
        <h4 align="center"><?= $userlogin['nome']; ?></h4>
        <p align="center"><?php if($userlogin['nivel'] == 4){
                echo 'Desenvolvedor';}elseif($userlogin['nivel'] == 3){
                echo 'Administrador';}elseif($userlogin['nivel'] == 2){
                echo 'Organizador';}else{
                echo "Palestrante";
            }

            ?></p>
    </section>
    <section class="navegacao-nome">
        <p> Navegação</p>
    </section>
    <section onclick="window.location.assign('painel.php')" class="navegacao">
        <p><i class="fa fa-building"></i> Painel</p>
    </section>
    <section class="navegacao">
        <p><i class="fa fa-street-view"></i>Perfil</p>
    </section>
    <section onclick="window.location.assign('trabalhos.php')" class="navegacao">
        <p><i class="fa fa-file-text"></i>Trabalhos</p>
    </section>
    <section onclick="loadAluno()" class="navegacao">
        <p><i class="fa fa-users"></i>Alunos</p>
    </section>
    <section class="navegacao">
        <p> <i class="fa fa-power-off"></i>Sair</p>
    </section>

</section>




</section>

<?php

include_once '../app/View/newTrabalho.php' ?>

<!--
        <footer class="main_footer">
            <a href="http://www.fbend.info" target="_blank" title="FBend">&copy; Sistema de Informação - Todos os Direitos Reservados</a>
        </footer>
-->
</body>

</html>