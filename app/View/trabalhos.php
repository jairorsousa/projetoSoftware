<link rel="stylesheet" href="../css/fbend.css">
<style>
    #box{
        position: absolute;
        right: 15px;
        top: 50px;
        width: 82%;
        height: auto;
    }
    #box table thead{
        color: #1C3D50;

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
    .info:hover{
        background: #1C3D50 ;
        color: #fff ;
        cursor: pointer;
    }
    #box table {
        background: #fff;
    }
    #box table thead{
        background: #fff;
        color: #1C3D50;
    }
</style>



<?php
/**
 * Created by PhpStorm.
 * User: Jairo
 * Date: 15/10/2015
 * Time: 17:24
 */
?>

<section id="box">
    <section onclick="window.location.assign('newTrabalho.php');" class="info">

        <p align="center"><i class="fa fa-plus"></i>Submeter Novo Trabalho</p>


    </section>
    <table>
        <thead>
        <tr>
            <td>Data</td>
            <td>Titulo</td>
            <td>Status</td>
        </tr>
        </thead>
        <?php
        $codPaslestrante = $userlogin['codigo'];
        $ver = new Read();
        $ver->FullRead("SELECT trabalhos.data_submetido, trabalhos.titulo, trabalhos.status
FROM autor_trabalho
INNER JOIN pessoas ON autor_trabalho.codigo_autor = pessoas.codigo
INNER JOIN trabalhos ON autor_trabalho.codigo_trabalho = trabalhos.codigo
where pessoas.codigo = {$codPaslestrante}");
        foreach($ver->getResult() as $result):
            extract($result);
            if($status == 'A'){
                $resStatus = "Aprovado";
            }elseif($status == 'R'){
                $resStatus = "Não Aprovado";
            }else{
                $resStatus = "Não Avaliado";
            }
            //$data_submetido = Check::DataR($data_submetido);
            ?>
            <tr>

                <td><?=$data_submetido?></td>
                <td><?=$titulo?></td>
                <td><?=$resStatus?></td>


            </tr>


            <?php


        endforeach;
        ?>

    </table>
</section>

