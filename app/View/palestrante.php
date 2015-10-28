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
    <table>
        <thead>
        <tr>

            <td>Tipo</td>
            <td>Nome</td>
            <td>Titulo</td>

        </tr>
        </thead>
        <?php
        $ver = new Read();
        $ver->FullRead("SELECT tipo_atividades.nome AS atividade, pessoas.nome, trabalhos.titulo FROM autor_trabalho INNER JOIN pessoas ON autor_trabalho.codigo_autor = pessoas.codigo INNER JOIN trabalhos ON autor_trabalho.codigo_trabalho = trabalhos.codigo INNER JOIN tipo_atividades on trabalhos.tipo_atividade = tipo_atividades.codigo WHERE status = 'A'");
        foreach($ver->getResult() as $result):
            extract($result);
            ?>
            <tr>
                <td><?=$atividade?></td>
                <td><?=$nome?></td>
                <td><?=$titulo?></td>




            </tr>


            <?php


        endforeach;
        ?>

    </table>
</section>


