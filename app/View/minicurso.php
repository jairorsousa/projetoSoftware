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

            <td>Palestrante</td>
            <td>Titulo</td>
            <td>Data</td>
            <td>Horário</td>

        </tr>
        </thead>
        <?php
        $ver = new Read();
        $ver->FullRead("SELECT pessoas.nome, trabalhos.titulo
FROM autor_trabalho
INNER JOIN pessoas ON autor_trabalho.codigo_autor = pessoas.codigo
INNER JOIN trabalhos ON autor_trabalho.codigo_trabalho = trabalhos.codigo
WHERE  tipo_atividade = 2 and status = 'a'");
        foreach($ver->getResult() as $result):
            extract($result);
            ?>
            <tr>

                <td><?=$nome?></td>
                <td><?=$titulo?></td>
                <td></td>
                <td></td>


            </tr>


            <?php


        endforeach;
        ?>

    </table>
</section>


