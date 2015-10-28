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
        <input type="file" name="fileUpload" onblur=comprueba_extension(this.form, this.form.fileUpload.value)" required>
        <button type="submit">Submeter Trabalho &nbsp;<i class="fa fa-upload"></i></button>
       </form>
</section>
<script>
    function comprueba_extension(formulario, archivo) {
        extensiones_permitidas = new Array(".gif", ".jpg", ".doc", ".pdf");
        mierror = "";
        if (!archivo) {
//Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario
            mierror = "No has seleccionado ningún archivo";
        }else{
//recupero la extensión de este nombre de archivo
            extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
//alert (extension);
//compruebo si la extensión está entre las permitidas
            permitida = false;
            for (var i = 0; i < extensiones_permitidas.length; i++) {
                if (extensiones_permitidas[i] == extension) {
                    permitida = true;
                    break;
                }
            }
            if (!permitida) {
                mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
            }else{
//submito!
                alert ("Todo correcto. Voy a submitir el formulario.");
                formulario.submit();
                return 1;
            }
        }
//si estoy aqui es que no se ha podido submitir
        alert (mierror);
        return 0;
    }
</script>

