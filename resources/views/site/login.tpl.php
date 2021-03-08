<section class="login">

    <div class="container">

        <!-- LOGIN -->
        <div class="row">

            <div class="col-12 col-md-4" id="box-login">

                <form class="w-100" action="/login" method="POST">
                    <h2 class="pets-title text-center"><b><i class="fa fa-paw" aria-hidden="true"></i> Realize o Login</b></h2>
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="text" class="form-control" name="mail" id="" placeholder="E-mail" />
                            <span class="incorrect-feedback"><?= isset($_SESSION['login_feedback']) ? $_SESSION['login_feedback'] : '' ?></span>
                        </div>
                        <div class="form-group col-12">
                            <input type="password" class="form-control" name="password" id="" placeholder="Senha" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 mb-0 text-right">
                            <button type="submit" class="btn login-btn w-100"><b>Entrar</b></button>
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-12 col-md-8" id="box-cadastro">

                <form class="w-100" action="/user/register" method="POST">
                    <h2 class="pets-title text-center"><b><i class="fa fa-paw" aria-hidden="true"></i> Realize o cadastro</b></h2>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control" name="name" id="" placeholder="Nome" value="<?= isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : '' ?>" />
                            <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['name']) ? $_SESSION['feedback']['name'] : '' ?></span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control" name="mail" id="" placeholder="E-mail" value="<?= isset($_SESSION['old']['mail']) ? $_SESSION['old']['mail'] : '' ?>"/>
                            <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['mail']) ? $_SESSION['feedback']['mail'] : '' ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <input type="password" class="form-control" name="password" id="" placeholder="Senha" />
                            <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['password']) ? $_SESSION['feedback']['password'] : '' ?></span>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="password" class="form-control" name="confirm_password" id="" placeholder="Confirmar senha"/>
                            <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['confirm_password']) ? $_SESSION['feedback']['confirm_password'] : '' ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 mb-0 text-right">
                            <button type="submit" class="btn login-btn w-100"><b>Cadastrar</b></button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        
    </div>

</section>

<!-- LIMPAR SESSIONS -->
<?php

unset($_SESSION['login_feedback']);
unset($_SESSION['old']);
unset($_SESSION['feedback']);

?>