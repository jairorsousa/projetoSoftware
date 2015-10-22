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
            <td style="display: none;">Cod</td>
            <td>Data</td>
            <td>Nome</td>
            <td>Titulo</td>
            <td>Anexos</td>
            <td>Aprovar</td>
            <td>Reprovar</td>

        </tr>
        </thead>
        <?php
         $ver = new Read();
         $ver->FullRead("SELECT pessoas.nome, trabalhos.titulo, trabalhos.anexo, trabalhos.data_submetido, trabalhos.codigo
FROM autor_trabalho
INNER JOIN pessoas ON autor_trabalho.codigo_autor = pessoas.codigo
INNER JOIN trabalhos ON autor_trabalho.codigo_trabalho = trabalhos.codigo
WHERE  status = 'N'");
        foreach($ver->getResult() as $result):
          extract($result);
        ?>
            <tr>
                <td style="display: none;"><?=$codigo?></td>
                <td><?=$data_submetido?></td>
                <td><?=$nome?></td>
                <td><?=$titulo?></td>
                <td><a href="http://www.cliqueplay.com.br/sigea/uploads/<?=$anexo?>" target="_blank">Visualizar</a></td>
                <td><a href="../p.php?c=TrabalhoC&m=ApTrabalho&p=<?=$codigo?>">Aprovar</a></td>
                <td><a href="#">Reprovar</a></td>

            </tr>


        <?php


        endforeach;
        ?>

    </table>
    </section>

