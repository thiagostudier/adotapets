<nav class="nav-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="text-uppercase breadcrumb-item"><a href="/">Home</a></li>
        <li class="text-uppercase breadcrumb-item active" aria-current="page"><b>ONGS</b></li>
    </ol>
</nav>

<?php if($data['ongs']){ ?>

<section class="ong minhas-ongs">

    <div class="container">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Minhas ONGs</b></h2>
        <?php foreach($data['ongs'] as $ong){ ?>
        <div class="row col-12 mb-5">
            <div class="col-12 col-md-2 px-0">
                <div class="img-box">
                    <img src="/upload/ong/<?=$ong['photo']?>" alt="<?=$ong['name']?> - Logo" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" class="img-responsive">
                    <label for="input_photo_<?=$ong['id']?>"></label>
                </div>
                <form class="d-none" action="/ong/register/<?=$ong['id']?>/image" method="POST" enctype="multipart/form-data" id="photo-ong-<?=$ong['id']?>">
                    <input type="file" class="form-control flex-1 rounded-0 input-photo-ong" data-form="photo-ong-<?=$ong['id']?>" name="photo" id="input_photo_<?=$ong['id']?>" style="flex: 1"/> 
                </form>
            </div>
            <div class="col-12 col-md-10">
                <h3>
                    <span class="ong-title"><?=$ong['name']?></span> 
                    <a href="/user/ong/<?=$ong['id']?>/pets" class="btn-link-style-default"><i class="fa fa-paw" aria-hidden="true"></i> Pets</a>
                    <a href="/user/ong/<?=$ong['id']?>/edit" class="btn-link-style-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                    <!-- <form class="d-inline-block" action="/ong//delete" method="POST">
                        <input type="hidden" name="id" value="" />
                        <button class="btn-link-style-danger border-0" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Apagar</button>
                    </form> -->
                </h3>
                <div class="col-12">
                    <p><?=$ong['rua'] != '' ? $ong['rua'] : '(rua)'?>, <?=$ong['numero'] != '' ? $ong['numero'] : '(número)'?> - <?=$ong['cidade'] != '' ? $ong['cidade'] : '(cidade)'?> - <?=$ong['estado'] != '' ? $ong['estado'] : '(estado)'?> <br>
                    <?=$ong['telefone'] != '' ? $ong['telefone'] : '(telefone)'?> • <?=$ong['celular'] != '' ? $ong['celular'] : '(celular)'?></br>
                    <?=$ong['site'] != '' ? $ong['site'] : '(site)'?> • <?=$ong['mail'] != '' ? $ong['mail'] : '(e-mail)'?> <br />
                    148 pets cadastrados <br />
                    <b><?=$ong['slug'] != '' ? $ong['slug'] : '(link)'?></b></p>
                    <div class="social-media footer-info-social-media">
                        <?=$ong['facebook'] ? '<a href="'.$ong['facebook'].'" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-facebook" aria-hidden="true"></i></a>' : ''?>
                        <?=$ong['twitter'] ? '<a href="'.$ong['twitter'].'" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-twitter" aria-hidden="true"></i></a>' : ''?>
                        <?=$ong['instagram'] ? '<a href="'.$ong['instagram'].'" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-instagram" aria-hidden="true"></i></a>' : ''?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

</section>

<?php } ?>

<!-- O USUÁRIO SÓ PODERÁ TER UMA ONG -->
<?php if(!$data['ongs']){ ?>
<section class="register-ong">

    <div class="container">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Cadastre sua ONG</b></h2>
        <form class="w-100" action="/ong/register" method="POST">
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="name_ong">Nome da ONG *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="name" <?= isset($_SESSION['old']['name']) ? 'value="'.$_SESSION['old']['name'].'"' : '' ?> id="name_ong" placeholder="Nome da ONG" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['name']) ? $_SESSION['feedback']['name'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="cep">CEP *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="cep" <?= isset($_SESSION['old']['cep']) ? 'value="'.$_SESSION['old']['cep'].'"' : '' ?> id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['cep']) ? $_SESSION['feedback']['cep'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-3">
                    <label for="rua">Rua *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="rua" <?= isset($_SESSION['old']['rua']) ? 'value="'.$_SESSION['old']['rua'].'"' : '' ?> id="rua" placeholder="Rua" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['rua']) ? $_SESSION['feedback']['rua'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-3">
                    <label for="bairro">Bairro *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="bairro" <?= isset($_SESSION['old']['bairro']) ? 'value="'.$_SESSION['old']['bairro'].'"' : '' ?> id="bairro" placeholder="Bairro" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['bairro']) ? $_SESSION['feedback']['bairro'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-3">
                    <label for="cidade">Cidade *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="cidade" <?= isset($_SESSION['old']['cidade']) ? 'value="'.$_SESSION['old']['cidade'].'"' : '' ?> id="cidade" placeholder="Cidade" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['cidade']) ? $_SESSION['feedback']['cidade'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="uf">UF *</label>
                    <select name="estado" required="true" id="uf" class="form-control">
                        <option value="">UF</option>
                        <option value="AC" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'AC' ? 'selected' : '' ?>>Acre</option>
                        <option value="AL" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'AL' ? 'selected' : '' ?>>Alagoas</option>
                        <option value="AP" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'AP' ? 'selected' : '' ?>>Amapá</option>
                        <option value="AM" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'AM' ? 'selected' : '' ?>>Amazonas</option>
                        <option value="BA" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'BA' ? 'selected' : '' ?>>Bahia</option>
                        <option value="CE" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'CE' ? 'selected' : '' ?>>Ceará</option>
                        <option value="DF" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'DF' ? 'selected' : '' ?>>Distrito Federal</option>
                        <option value="ES" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'ES' ? 'selected' : '' ?>>Espírito Santo</option>
                        <option value="GO" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'GO' ? 'selected' : '' ?>>Goiás</option>
                        <option value="MA" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'MA' ? 'selected' : '' ?>>Maranhão</option>
                        <option value="MT" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'MT' ? 'selected' : '' ?>>Mato Grosso</option>
                        <option value="MS" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'MS' ? 'selected' : '' ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'MG' ? 'selected' : '' ?>>Minas Gerais</option>
                        <option value="PA" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'PA' ? 'selected' : '' ?>>Pará</option>
                        <option value="PB" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'PB' ? 'selected' : '' ?>>Paraíba</option>
                        <option value="PR" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'PR' ? 'selected' : '' ?>>Paraná</option>
                        <option value="PE" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'PE' ? 'selected' : '' ?>>Pernambuco</option>
                        <option value="PI" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'PI' ? 'selected' : '' ?>>Piauí</option>
                        <option value="RJ" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'RJ' ? 'selected' : '' ?>>Rio de Janeiro</option>
                        <option value="RN" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'RN' ? 'selected' : '' ?>>Rio Grande do Norte</option>
                        <option value="RS" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'RS' ? 'selected' : '' ?>>Rio Grande do Sul</option>
                        <option value="RO" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'RO' ? 'selected' : '' ?>>Rondônia</option>
                        <option value="RR" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'RR' ? 'selected' : '' ?>>Roraima</option>
                        <option value="SC" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'SC' ? 'selected' : '' ?>>Santa Catarina</option>
                        <option value="SP" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'SP' ? 'selected' : '' ?>>São Paulo</option>
                        <option value="SE" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'SE' ? 'selected' : '' ?>>Sergipe</option>
                        <option value="TO" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'TO' ? 'selected' : '' ?>>Tocantins</option>
                        <option value="EX" <?= isset($_SESSION['old']['estado']) && $_SESSION['old']['estado'] == 'EX' ? 'selected' : '' ?>>Estrangeiro</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['estado']) ? $_SESSION['feedback']['estado'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="numero">Número *</label>
                    <input type="number" class="form-control" name="numero" <?= isset($_SESSION['old']['numero']) ? 'value="'.$_SESSION['old']['numero'].'"' : '' ?> id="numero" placeholder="Número" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['numero']) ? $_SESSION['feedback']['numero'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="mail">E-mail de contato</label>
                    <input type="email" maxlength="255" class="form-control" name="mail" <?= isset($_SESSION['old']['mail']) ? 'value="'.$_SESSION['old']['mail'].'"' : '' ?> id="mail" placeholder="E-mail" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['mail']) ? $_SESSION['feedback']['mail'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="site">Site</label>
                    <input type="text" maxlength="255" class="form-control" name="site" <?= isset($_SESSION['old']['site']) ? 'value="'.$_SESSION['old']['site'].'"' : '' ?> id="site" placeholder="Site" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['site']) ? $_SESSION['feedback']['site'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="telefone">Telefone</label>
                    <input type="text" maxlength="255" class="form-control telefone" name="telefone" <?= isset($_SESSION['old']['telefone']) ? 'value="'.$_SESSION['old']['telefone'].'"' : '' ?> id="telefone" placeholder="Telefone" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['telefone']) ? $_SESSION['feedback']['telefone'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control celular" name="celular" <?= isset($_SESSION['old']['celular']) ? 'value="'.$_SESSION['old']['celular'].'"' : '' ?> id="celular" placeholder="Celular" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['celular']) ? $_SESSION['feedback']['celular'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="facebook">Facebook</label>
                    <input type="text" maxlength="255" class="form-control" name="facebook" <?= isset($_SESSION['old']['facebook']) ? 'value="'.$_SESSION['old']['facebook'].'"' : '' ?> id="facebook" placeholder="Facebook" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['facebook']) ? $_SESSION['feedback']['facebook'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="twitter">Twitter</label>
                    <input type="text" maxlength="255" class="form-control" name="twitter" <?= isset($_SESSION['old']['twitter']) ? 'value="'.$_SESSION['old']['twitter'].'"' : '' ?> id="twitter" placeholder="Twitter" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['twitter']) ? $_SESSION['feedback']['twitter'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="instagram">Instagram</label>
                    <input type="text" maxlength="255" class="form-control" name="instagram" <?= isset($_SESSION['old']['instagram']) ? 'value="'.$_SESSION['old']['instagram'].'"' : '' ?> id="instagram" placeholder="Instagram" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['instagram']) ? $_SESSION['feedback']['instagram'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="visible">Permitir visibilidade pública *</label>
                    <select name="visible" required="true" id="visible" class="form-control">
                        <option value="">Visível</option>
                        <option value="1" <?= isset($_SESSION['old']['visible']) && $_SESSION['old']['visible'] == '1' ? 'selected' : '' ?>>Sim</option>
                        <option value="0" <?= isset($_SESSION['old']['visible']) && $_SESSION['old']['visible'] == '0' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['visible']) ? $_SESSION['feedback']['visible'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="slug">Link da ong (sem espaços, sem caracteres especiais, apenas letras minúsculas) *</label>
                    <input type="text" maxlength="255" pattern="[a-z-_]{1,25}" required="true" class="form-control" name="slug" <?= isset($_SESSION['old']['slug']) ? 'value="'.$_SESSION['old']['slug'].'"' : '' ?> id="slug" placeholder="link_da_ong" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['slug']) ? $_SESSION['feedback']['slug'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 mb-0 text-right">
                    <button type="submit" class="btn register-ong-btn pull-right"><b>Cadastrar</b></button>
                </div>
            </div>
        </form>
        
    </div>

    <!-- LIMPAR SESSIONS -->
    <?php

        unset($_SESSION['old']);
        unset($_SESSION['feedback']);

    ?>

</section>
<?php } ?>

<script>

    $(".input-photo-ong").on("change", function(){ 
        id = "#"+$(this).data('form');
        console.log(id);
        $(id).submit();
    });

</script>