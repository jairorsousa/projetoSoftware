<style>

</style>
<section>
    <img src="<?=BASE?>img/logo_3.png">
    <h1>Enviar Trabalho</h1>
    <form enctype="multipart/form-data" action="s.php?c=PessoaC&m=GravarTrabalho" method="post" >
      <input style="display: none;" type="text" name="idPes" value="<?=$parametro?>">
        <label>Tipo de Atividade</label>
        <select name="tipoAtividade" autofocus>
            <option>Selecione</option>
            <?php
            foreach($tipoAtividade->getResult() as $result){
                extract($result);
                echo  "<option>{$nome}</option>";
            }?>
        </select>
        <label>Titulo: </label>
        <input type="text" name="titulo" required="Informe O Titulo do Trabalho" placeholder="Informe o Titulo do Trabalho">
        <label class="espaco">Fale Um Pouco Sobre o Trabalho:</label>
          <textarea  rows="5" name="resumo" required  placeholder="Descreva um aqui um Resumo sobre seu Trabalho">
    </textarea>

        <label class="espaco">Fale Um Pouco Sobre o Você:</label>
          <textarea rows="5" name="perfil" placeholder="Descreva um aqui um Resumo sobre seu Voce">
    </textarea>
        <label>Telefone: </label>
        <input type="text" name="telefone" required= "informe seu telefone" placeholder="Informe seu telefone">
        <label class="espaco">Anexar Arquivo:</label>
        <input type="file" size="5000" name="fileUpload" onchange="verificaExten(this.form, this.form.fileUpload.value)" required>


        <button class="btnForm" type="submit">Submeter Trabalho &nbsp;<i class="fa fa-upload"></i></button>
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

