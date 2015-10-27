<link rel="stylesheet" href="../css/fbend.css">
<style>
    #box{
        position: absolute;
        right: 15px;
        top: 50px;
        width: 82%;
        height: auto;
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
    <form enctype="multipart/form-data" action="s.php?c=PessoaC&m=GravarTrabalho" method="post" >
        <label>Tipo de Atividade</label>
        <select name="tipoAtividade" autofocus>
            <option>Selecione</option>
        </select>
        <label>Titulo: </label>
        <input type="text" name="titulo" required="Informe O Titulo do Trabalho" placeholder="Informe o Titulo do Trabalho">
        <label class="espaco">Fale Um Pouco Sobre o Trabalho:</label>
          <textarea  rows="5" name="resumo" required  placeholder="Descreva um aqui um Resumo sobre seu Trabalho">
    </textarea>
        <label class="espaco">Anexar Arquivo:</label>
        <input type="file" name="fileUpload" required>

        <button class="btnForm" type="submit">Submeter Trabalho &nbsp;<i class="fa fa-upload"></i></button>
    </form>
</section>

