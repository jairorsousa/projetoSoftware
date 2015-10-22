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
        <label>Senha: </label>
        <input type="password" name="senha" required= "informe sua senha" placeholder="Informe sua Senha">
        <label class="espaco">Anexar Arquivo:</label>
        <input type="file" name="fileUpload" required>


        <button class="btnForm" type="submit">Submeter Trabalho &nbsp;<i class="fa fa-upload"></i></button>
    </form>





</section>

