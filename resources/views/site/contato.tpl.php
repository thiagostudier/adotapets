<!-- SOBRE -->
<section class="about register-ong">
    <div class="container px-0">

        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Entre em contato </b></h2>

        <h3 class="text-center sucess <?= isset($_SESSION['feedback_sucess']) ? '' : 'd-none' ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> E-mail enviado com sucesso!</h3>
        
        <form class="w-100" action="/send/contato" method="POST">
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="name">Nome</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="name" <?= isset($_SESSION['old']['name']) ? 'value="'.$_SESSION['old']['name'].'"' : '' ?> id="name" placeholder="Informe seu nome" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['name']) ? $_SESSION['feedback']['name'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="email">E-mail</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="email" <?= isset($_SESSION['old']['email']) ? 'value="'.$_SESSION['old']['email'].'"' : '' ?> id="email" placeholder="Informe seu e-mail" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['email']) ? $_SESSION['feedback']['email'] : '' ?></span>
                </div>
            </div>           
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="telefone">Telefone/Celular</label>
                    <input type="text" maxlength="255" required="true" class="form-control celular" name="telefone" <?= isset($_SESSION['old']['telefone']) ? 'value="'.$_SESSION['old']['telefone'].'"' : '' ?> id="celular" placeholder="Informe seu telefone" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['telefone']) ? $_SESSION['feedback']['telefone'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="assunto">Assunto</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="assunto" <?= isset($_SESSION['old']['assunto']) ? 'value="'.$_SESSION['old']['assunto'].'"' : '' ?> id="assunto" placeholder="Qual é o assunto da mensagem?" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['assunto']) ? $_SESSION['feedback']['assunto'] : '' ?></span>
                </div>
            </div>  
            <div class="row">
                <div class="form-group col-12">
                    <label for="descricao">Mensagem</label>  
                    <textarea maxlength="60000" required="true" name="descricao" class="form-control" id="" rows="5" placeholder="Descrição"><?= isset($_SESSION['old']['descricao']) ? $_SESSION['old']['descricao'] : '' ?></textarea>
                </div>
            </div>         
            <div class="row">
                <div class="form-group col-12 mb-0 text-right">
                    <button type="submit" class="btn register-ong-btn pull-right"><b><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar</b></button>
                </div>
            </div>
        </form>

        <!-- LIMPAR SESSIONS -->
    <?php

unset($_SESSION['feedback']);
unset($_SESSION['feedback_sucess']);

    ?>
        
    </div>
</section>