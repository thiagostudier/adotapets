<nav class="nav-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="text-uppercase breadcrumb-item"><a href="/">Home</a></li>
        <li class="text-uppercase breadcrumb-item"><a href="/user/ongs">ONGS</a></li>
        <li class="text-uppercase breadcrumb-item" aria-current="page"><b>Editar ONG</b></li>
    </ol>
</nav>

<section class="register-ong">

    <div class="container">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Editar ONG</b></h2>
        <form class="w-100" action="/ong/<?=$data['ong']['id']?>/edit" method="POST">
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="name_ong">Nome da ONG *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="name" <?= isset($data['ong']['name']) ? 'value="'.$data['ong']['name'].'"' : '' ?> id="name_ong" placeholder="Nome da ONG" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['name']) ? $_SESSION['feedback']['name'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="cep">CEP *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="cep" <?= isset($data['ong']['cep']) ? 'value="'.$data['ong']['cep'].'"' : '' ?> id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['cep']) ? $_SESSION['feedback']['cep'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-3">
                    <label for="rua">Rua *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="rua" <?= isset($data['ong']['rua']) ? 'value="'.$data['ong']['rua'].'"' : '' ?> id="rua" placeholder="Rua" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['rua']) ? $_SESSION['feedback']['rua'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-3">
                    <label for="bairro">Bairro *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="bairro" <?= isset($data['ong']['bairro']) ? 'value="'.$data['ong']['bairro'].'"' : '' ?> id="bairro" placeholder="Bairro" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['bairro']) ? $_SESSION['feedback']['bairro'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-3">
                    <label for="cidade">Cidade *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="cidade" <?= isset($data['ong']['cidade']) ? 'value="'.$data['ong']['cidade'].'"' : '' ?> id="cidade" placeholder="Cidade" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['cidade']) ? $_SESSION['feedback']['cidade'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="uf">UF *</label>
                    <select name="estado" required="true" id="uf" class="form-control">
                        <option value="">UF</option>
                        <option value="AC" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'AC' ? 'selected' : '' ?>>Acre</option>
                        <option value="AL" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'AL' ? 'selected' : '' ?>>Alagoas</option>
                        <option value="AP" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'AP' ? 'selected' : '' ?>>Amapá</option>
                        <option value="AM" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'AM' ? 'selected' : '' ?>>Amazonas</option>
                        <option value="BA" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'BA' ? 'selected' : '' ?>>Bahia</option>
                        <option value="CE" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'CE' ? 'selected' : '' ?>>Ceará</option>
                        <option value="DF" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'DF' ? 'selected' : '' ?>>Distrito Federal</option>
                        <option value="ES" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'ES' ? 'selected' : '' ?>>Espírito Santo</option>
                        <option value="GO" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'GO' ? 'selected' : '' ?>>Goiás</option>
                        <option value="MA" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'MA' ? 'selected' : '' ?>>Maranhão</option>
                        <option value="MT" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'MT' ? 'selected' : '' ?>>Mato Grosso</option>
                        <option value="MS" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'MS' ? 'selected' : '' ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'MG' ? 'selected' : '' ?>>Minas Gerais</option>
                        <option value="PA" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'PA' ? 'selected' : '' ?>>Pará</option>
                        <option value="PB" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'PB' ? 'selected' : '' ?>>Paraíba</option>
                        <option value="PR" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'PR' ? 'selected' : '' ?>>Paraná</option>
                        <option value="PE" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'PE' ? 'selected' : '' ?>>Pernambuco</option>
                        <option value="PI" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'PI' ? 'selected' : '' ?>>Piauí</option>
                        <option value="RJ" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'RJ' ? 'selected' : '' ?>>Rio de Janeiro</option>
                        <option value="RN" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'RN' ? 'selected' : '' ?>>Rio Grande do Norte</option>
                        <option value="RS" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'RS' ? 'selected' : '' ?>>Rio Grande do Sul</option>
                        <option value="RO" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'RO' ? 'selected' : '' ?>>Rondônia</option>
                        <option value="RR" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'RR' ? 'selected' : '' ?>>Roraima</option>
                        <option value="SC" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'SC' ? 'selected' : '' ?>>Santa Catarina</option>
                        <option value="SP" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'SP' ? 'selected' : '' ?>>São Paulo</option>
                        <option value="SE" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'SE' ? 'selected' : '' ?>>Sergipe</option>
                        <option value="TO" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'TO' ? 'selected' : '' ?>>Tocantins</option>
                        <option value="EX" <?= isset($data['ong']['estado']) && $data['ong']['estado'] == 'EX' ? 'selected' : '' ?>>Estrangeiro</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['estado']) ? $_SESSION['feedback']['estado'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="numero">Número *</label>
                    <input type="number" class="form-control" name="numero" <?= isset($data['ong']['numero']) ? 'value="'.$data['ong']['numero'].'"' : '' ?> id="numero" placeholder="Número" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['numero']) ? $_SESSION['feedback']['numero'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="mail">E-mail de contato</label>
                    <input type="email" maxlength="255" class="form-control" name="mail" <?= isset($data['ong']['mail']) ? 'value="'.$data['ong']['mail'].'"' : '' ?> id="mail" placeholder="E-mail" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['mail']) ? $_SESSION['feedback']['mail'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="site">Site</label>
                    <input type="text" maxlength="255" class="form-control" name="site" <?= isset($data['ong']['site']) ? 'value="'.$data['ong']['site'].'"' : '' ?> id="site" placeholder="Site" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['site']) ? $_SESSION['feedback']['site'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="telefone">Telefone</label>
                    <input type="text" maxlength="255" class="form-control telefone" name="telefone" <?= isset($data['ong']['telefone']) ? 'value="'.$data['ong']['telefone'].'"' : '' ?> id="telefone" placeholder="Telefone" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['telefone']) ? $_SESSION['feedback']['telefone'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control celular" name="celular" <?= isset($data['ong']['celular']) ? 'value="'.$data['ong']['celular'].'"' : '' ?> id="celular" placeholder="Celular" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['celular']) ? $_SESSION['feedback']['celular'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="facebook">Facebook</label>
                    <input type="text" maxlength="255" class="form-control" name="facebook" <?= isset($data['ong']['facebook']) ? 'value="'.$data['ong']['facebook'].'"' : '' ?> id="facebook" placeholder="Facebook" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['facebook']) ? $_SESSION['feedback']['facebook'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="twitter">Twitter</label>
                    <input type="text" maxlength="255" class="form-control" name="twitter" <?= isset($data['ong']['twitter']) ? 'value="'.$data['ong']['twitter'].'"' : '' ?> id="twitter" placeholder="Twitter" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['twitter']) ? $_SESSION['feedback']['twitter'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="instagram">Instagram</label>
                    <input type="text" maxlength="255" class="form-control" name="instagram" <?= isset($data['ong']['instagram']) ? 'value="'.$data['ong']['instagram'].'"' : '' ?> id="instagram" placeholder="Instagram" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['instagram']) ? $_SESSION['feedback']['instagram'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm">
                    <label for="visible">Permitir visibilidade pública *</label>
                    <select name="visible" required="true" id="visible" class="form-control">
                        <option value="">Visível</option>
                        <option value="1" <?= isset($data['ong']['visible']) && $data['ong']['visible'] == '1' ? 'selected' : '' ?>>Sim</option>
                        <option value="0" <?= isset($data['ong']['visible']) && $data['ong']['visible'] == '0' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['visible']) ? $_SESSION['feedback']['visible'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm">
                    <label for="slug">Link da ong (sem espaços, sem caracteres especiais, apenas letras minúsculas) *</label>
                    <input type="text" maxlength="255" pattern="[a-z-_]{1,25}" required="true" class="form-control" name="slug" <?= isset($data['ong']['slug']) ? 'value="'.$data['ong']['slug'].'"' : '' ?> id="slug" placeholder="linkdaong" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['slug']) ? $_SESSION['feedback']['slug'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 mb-0 text-right">
                    <button type="submit" class="btn register-ong-btn pull-right"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Salvar</b></button>
                </div>
            </div>
        </form>
    </div>

    <!-- LIMPAR SESSIONS -->
    <?php

        unset($data['ong']);
        unset($_SESSION['feedback']);

    ?>

</section>
