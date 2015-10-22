<style>

    section > form > input{
        width: 36%;
        margin-bottom: 10px;
        font-size: 14px;
    }
    section > form > .espaco{
        margin-left: 2%;
    }
    section > form > .primeiro{
        margin-left: 3px;
    }
    section > form > input:last-child{
        background-image:url("../img/next21.png");
        background-repeat: no-repeat;
        background-position: 90px 13px;
        border-radius: 0px;
        border: 0px;
        background-color: #2c353f;
        width: 110px;
        height: 37px;
        color: #fff;
        font-size: 22px;
        position: absolute;
        left: 50%;
        top: 80%;
        margin-left:-55px;
        margin-top: -18px;

    }
</style>
<section>
    <img src="<?=BASE?>img/logo_3.png">
    <h1>Cadastro de Palestrantes</h1>
    <form action="s.php?c=PessoaC&m=Pegar" method="post">

        <label>Nome: </label>
        <input class="primeiro" type="text" name="nome" placeholder="Seu Nome Completo" required="Informe seu Nome">
        <label class="espaco">CPF: </label>
        <!--<input class="primeiro" type="text" name="cpf" placeholder="Seu CPF">-->
        <input type="text" name="cpf" id="cpf" placeholder="Seu CPF" required onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);"  maxlength="14" />
        <br>
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Seu e-mail" required>
        <label class="espaco">Fone: </label>
        <input type="text" name="telefone" placeholder="Seu Telefone">
        <button class="btnForm" type="submit">Avançar &nbsp;<i class="fa fa-arrow-right"></i></button>
    </form>

</section>



<script>
    function validarCPF( cpf ){
        var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;

        if(!filtro.test(cpf))
        {
            window.alert("CPF inválido. Tente novamente.");
            return false;
        }

        cpf = remove(cpf, ".");
        cpf = remove(cpf, "-");

        if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
            cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
            cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
            cpf == "88888888888" || cpf == "99999999999")
        {
            window.alert("CPF inválido. Tente novamente.");
            return false;
        }

        soma = 0;
        for(i = 0; i < 9; i++)
        {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }

        resto = 11 - (soma % 11);
        if(resto == 10 || resto == 11)
        {
            resto = 0;
        }
        if(resto != parseInt(cpf.charAt(9))){
            window.alert("CPF inválido. Tente novamente.");
            return false;
        }

        soma = 0;
        for(i = 0; i < 10; i ++)
        {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }
        resto = 11 - (soma % 11);
        if(resto == 10 || resto == 11)
        {
            resto = 0;
        }

        if(resto != parseInt(cpf.charAt(10))){
            window.alert("CPF inválido. Tente novamente.");
            return false;
        }

        return true;
    }

    function remove(str, sub) {
        i = str.indexOf(sub);
        r = "";
        if (i == -1) return str;
        {
            r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
        }

        return r;
    }

    /**
     * MASCARA ( mascara(o,f) e execmascara() ) CRIADAS POR ELCIO LUIZ
     * elcio.com.br
     */
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }

    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }

    function cpf_mask(v){
        v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
        v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
        v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
        return v
    }
</script>



