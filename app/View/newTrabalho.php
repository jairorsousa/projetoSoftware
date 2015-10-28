<link rel="stylesheet" href="../css/fbend.css">
<style>
    #box{
        position: absolute;
        right: 15px;
        top: 50px;
        width: 82%;
        height: auto;
    }
    .btnsub{
        margin-left: 40%;
        background: #00254A;
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
    <form enctype="multipart/form-data" action="<?=BASE?>s.php?c=TrabalhoC&m=GravarTrabalho" method="post" >
        <input style="display: none;" type="text" name="idPes" value="<?=$userlogin['codigo']?>">
        <label>Tipo de Atividade</label>
        <select name="tipoAtividade" autofocus>
            <option>Palestra</option>
            <option>MiniCurso</option>
            <option>Banner</option>
        </select>
        <label>Titulo: </label>
        <input type="text" name="titulo" required="Informe O Titulo do Trabalho" placeholder="Informe o Titulo do Trabalho">
        <label class="espaco">Fale Um Pouco Sobre o Trabalho:</label>
          <textarea  rows="5" name="resumo" required  placeholder="Descreva um aqui um Resumo sobre seu Trabalho">
    </textarea>
        <label class="espaco">Anexar Arquivo:</label>
        <input type="file" size="5000" name="fileUpload" onchange="verificaExten(this.form, this.form.fileUpload.value)" required>
        <button class="btnsub" type="submit">Submeter Trabalho &nbsp;<i class="fa fa-upload"></i></button>
       </form>
</section>
<script>
    function verificaExten(formulario, archivo) {
        extensiones_permitidas = new Array(".doc", ".docx");
        mierror = "";
        if (!archivo) {

        }else{
            extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();

            permitida = false;
            for (var i = 0; i < extensiones_permitidas.length; i++) {
                if (extensiones_permitidas[i] == extension) {
                    permitida = true;
                    break;
                }
            }
            if (!permitida) {
                mierror = "So é permitido anexo de arquivos " + extensiones_permitidas.join();
                alert (mierror);
            }else{


                return 1;
            }
        }

        return 0;
    }
</script>

