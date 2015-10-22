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
        <li><a class="icon logout radius" href="painel.php?logoff=true">Sair</a></li>
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
    <section onclick="window.location.assign('painel.php');" class="navegacao">
        <p>Painel</p>
    </section>
    <section onclick="window.location.assign('palestrante.php');" class="navegacao">
        <p> Palestrantes</p>
    </section>
    <section onclick="window.location.assign('minicurso.php');" class="navegacao">
        <p> Minicursos</p>
    </section>
    <section onclick="window.location.assign('palestra.php');"class="navegacao">
        <p> Palestras</p>
    </section>
    <section  onclick="window.location.assign('aluno.php');" class="navegacao">
        <p> Alunos</p>
    </section>




</section>


               <?php

       include_once '../app/View/aluno.php';

        ?>

<!--
        <footer class="main_footer">
            <a href="http://www.fbend.info" target="_blank" title="FBend">&copy; Sistema de Informação - Todos os Direitos Reservados</a>
        </footer>
-->
    </body>

</html>