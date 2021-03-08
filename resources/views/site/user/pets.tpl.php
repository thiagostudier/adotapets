<nav class="nav-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="text-uppercase breadcrumb-item"><a href="/">Home</a></li>
        <li class="text-uppercase breadcrumb-item"><a href="/user/ongs">ONGS</a></li>
        <li class="text-uppercase breadcrumb-item" aria-current="page"><b>Pets da <?=$data['ong']['name']?></b></li>
    </ol>
</nav>

<?php if($data['pets']){ ?>

<section class="ong minhas-ongs">

    <div class="container">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Pets da ONG</b></h2>

        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Espécie</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Vacinado</th>
                    <th scope="col">Porte</th>
                    <th scope="col">Castrado</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Adotado</th>
                    <th scope="col">Visível</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['pets'] as $pet){ ?>
                <tr>
                    <td><?=$pet['name']?></td>
                    <td><?=$pet['especie']?></td>
                    <td><?=$pet['sexo']?></td>
                    <td><?=$pet['raca']?></td>
                    <td><?=$pet['vacinado']?></td>
                    <td><?=$pet['porte']?></td>
                    <td><?=$pet['castrado']?></td>
                    <td><?=$pet['idade']?> ano(s)</td>
                    <td><?=$pet['adotado'] ? 'Sim' : 'Não' ?></td>
                    <td><?=$pet['visible'] ? 'Sim' : 'Não'?></td>
                    <td>
                        <a href="/user/pet/<?=$pet['id']?>/edit" class="btn-link-style-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <form class="d-none" action="/pet/register/<?=$pet['id']?>/image" method="POST" enctype="multipart/form-data" id="photo-pet-<?=$pet['id']?>">
                            <input type="file" class="form-control flex-1 rounded-0 input-photo-ong" data-form="photo-pet-<?=$pet['id']?>" name="photo" id="input_photo_<?=$pet['id']?>" style="flex: 1"/> 
                        </form>                
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</section>

<?php } ?>

<section class="register-ong">

    <div class="container">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Cadastre um novo Pet</b></h2>
        <form class="w-100" action="/ong/<?=$data['ong']['id']?>/pet/register" method="POST">
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Nome do PET *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="name" <?= isset($_SESSION['old']['name']) ? 'value="'.$_SESSION['old']['name'].'"' : '' ?> id="" placeholder="Nome do Pet" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['name']) ? $_SESSION['feedback']['name'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Espécie *</label>
                    <select name="especie" required="true" id="" class="form-control">
                        <option value="">Espécie</option>
                        <option value="Cachorro" <?= isset($_SESSION['old']['especie']) && $_SESSION['old']['especie'] == 'Cachorro' ? 'selected' : '' ?>>Cachorro</option>
                        <option value="Gato" <?= isset($_SESSION['old']['especie']) && $_SESSION['old']['especie'] == 'Gato' ? 'selected' : '' ?>>Gato</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['especie']) ? $_SESSION['feedback']['especie'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Porte *</label>
                    <select name="porte" required="true" id="" class="form-control">
                        <option value="">Porte</option>
                        <option value="Pequeno" <?= isset($_SESSION['old']['porte']) && $_SESSION['old']['porte'] == 'Pequeno' ? 'selected' : '' ?>>Pequeno</option>
                        <option value="Médio" <?= isset($_SESSION['old']['porte']) && $_SESSION['old']['porte'] == 'Médio' ? 'selected' : '' ?>>Médio</option>
                        <option value="Grande" <?= isset($_SESSION['old']['porte']) && $_SESSION['old']['porte'] == 'Grande' ? 'selected' : '' ?>>Grande</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['porte']) ? $_SESSION['feedback']['porte'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Sexo *</label>
                    <select name="sexo" required="true" id="" class="form-control">
                        <option value="">Sexo</option>
                        <option value="Macho" <?= isset($_SESSION['old']['sexo']) && $_SESSION['old']['sexo'] == 'Macho' ? 'selected' : '' ?>>Macho</option>
                        <option value="Fêmea" <?= isset($_SESSION['old']['sexo']) && $_SESSION['old']['sexo'] == 'Fêmea' ? 'selected' : '' ?>>Fêmea</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['sexo']) ? $_SESSION['feedback']['sexo'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Raça *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="raca" <?= isset($_SESSION['old']['raca']) ? 'value="'.$_SESSION['old']['raca'].'"' : '' ?> id="" placeholder="Raça" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['raca']) ? $_SESSION['feedback']['raca'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Castrado *</label>
                    <select name="castrado" required="true" id="" class="form-control">
                        <option value="">Castrado</option>
                        <option value="Sim" <?= isset($_SESSION['old']['castrado']) && $_SESSION['old']['castrado'] == 'Sim' ? 'selected' : '' ?>>Sim</option>
                        <option value="Não" <?= isset($_SESSION['old']['castrado']) && $_SESSION['old']['castrado'] == 'Não' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['castrado']) ? $_SESSION['feedback']['castrado'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Idade *</label>
                    <input type="number" maxlength="255" required="true" class="form-control" name="idade" <?= isset($_SESSION['old']['idade']) ? 'value="'.$_SESSION['old']['idade'].'"' : '' ?> id="" placeholder="Idade" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['idade']) ? $_SESSION['feedback']['idade'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Vacinado *</label>
                    <select name="vacinado" required="true" id="" class="form-control">
                        <option value="">Vacinado</option>
                        <option value="Sim" <?= isset($_SESSION['old']['vacinado']) && $_SESSION['old']['vacinado'] == 'Sim' ? 'selected' : '' ?>>Sim</option>
                        <option value="Não" <?= isset($_SESSION['old']['vacinado']) && $_SESSION['old']['vacinado'] == 'Não' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['vacinado']) ? $_SESSION['feedback']['vacinado'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Foi adotado? *</label>
                    <select name="adotado" required="true" id="" class="form-control">
                        <option value="">Adotado</option>
                        <option value="1" <?= isset($_SESSION['old']['adotado']) && $_SESSION['old']['adotado'] == '1' ? 'selected' : '' ?>>Sim</option>
                        <option value="0" <?= isset($_SESSION['old']['adotado']) && $_SESSION['old']['adotado'] == '0' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['adotado']) ? $_SESSION['feedback']['adotado'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Permitir visibilidade pública *</label>  
                    <select name="visible" required="true" id="" class="form-control">
                        <option value="">Visível</option>
                        <option value="1" <?= isset($_SESSION['old']['visible']) && $_SESSION['old']['visible'] == '1' ? 'selected' : '' ?>>Sim</option>
                        <option value="0" <?= isset($_SESSION['old']['visible']) && $_SESSION['old']['visible'] == '0' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['visible']) ? $_SESSION['feedback']['visible'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="">Descrição do Pet</label>  
                    <textarea maxlength="60000" name="descricao" class="form-control" id="" rows="5" placeholder="Descrição"><?= isset($_SESSION['old']['descricao']) ? $_SESSION['old']['descricao'] : '' ?></textarea>
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

<script>

    $(".input-photo-ong").on("change", function(){ 
        id = "#"+$(this).data('form');
        console.log(id);
        $(id).submit();
    });

</script>