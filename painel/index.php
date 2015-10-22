<?php
session_start();
require('../app/Config.inc.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>SIGEA | Painel</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
<style>
    body {
        background-color: #1C3D50;
    }

    h1 {
        font-size: 30px;
        font-weight: bold;
        line-height: 35px;
        text-align: center;
        -webkit-font-smoothing: antialiased;
    }

    .bcgreen {
        color: #FFF;
        font-weight: bold;
        background-color: #00B05B;
        transition:1s;
        moz-transition:1s;
        -webkit-transition:1s;
    }
    .bcgreen:hover {
        background-color: #01CD6C;
        color: #FFF;
    }
    form{
        width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    img{
        margin-left: 40%;
    }
</style>
    </head>
    <body>



                <?php
                $login = new Login(3);
                if($login->CheckLogin()):
                    header('Location: painel.php');
                endif;
                $dataLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if(!empty($dataLogin['AdminLogin'])):

                     $login->ExeLogin($dataLogin);
                     if(!$login->getResult()):
                        echo $login->getErro();
                     else:
                         header('Location: painel.php');
                     endif;
                endif;
                $get = filter_input_array(INPUT_GET, 'exe', FILTER_DEFAULT);
                if(!empty($get)):
                    if($get == 'restrito'):
                        WSErro('<b>Oppss:</b> Acesso negado. Favor efetue login!', WS_INFOR);
                    elseif($get == 'logoff'):
                        WSErro('<b>Saiu</b> Sua saida foi realizada com sucesso', WS_INFOR);
                        endif;
                  endif;

                ?>



                <form name="login" action="" method="post">
                    <fieldset>


                        <div class="form-group">
                            <img src="../img/user.png" height="80" width="80">
                            <div class="input-group">
                                <span class="input-group-addon " id="basic-addon1">&nbsp;<i class="fa fa-user fa-lg"></i></span>
                                <input type="email" name="user" id="login" class="form-control input-lg" placeholder="E-mail">
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">&nbsp;<i class="fa fa-lock fa-lg"></i>&nbsp;</span>
                                    <input type="password" name="pass" id="password" class="form-control input-lg" placeholder="Senha">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" name="AdminLogin" class="btn btn-lg bcgreen btn-block" value="Entrar">
                                </div>
                            </div>
                    </fieldset>
                </form>

    </body>
</html>