<nav class="nav-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="text-uppercase breadcrumb-item"><a href="/">Home</a></li>
        <li class="text-uppercase breadcrumb-item"><a href="/user/ongs">ONGS</a></li>
        <li class="text-uppercase breadcrumb-item"><a href="/user/ong/<?=$data['ong']['id']?>/pets">Pets da <?=$data['ong']['name']?></a></li>
        <li class="text-uppercase breadcrumb-item" aria-current="page"><b>Editar Pet</b></li>
    </ol>
</nav>

<section class="register-ong">
    <div class="container">
        <h2 class="pets-title text-center"><b><i class="fa fa-paw" aria-hidden="true"></i> Editar Pet</b> </h2>

        <div class="col-12 col-sm-4 col-md-3 px-0 mx-auto mb-4">
            <div class="img-box">
                <img src="/upload/pet/<?=$data['pet']['photo']?>" alt="<?=$data['pet']['name']?> - Logo" class="img-responsive" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'">
                <label for="input_photo_<?=$data['pet']['id']?>"></label>
            </div>
            <form class="d-none" action="/pet/register/<?=$data['pet']['id']?>/image" method="POST" enctype="multipart/form-data" id="photo-pet-<?=$data['pet']['id']?>">
                <input type="file" class="form-control flex-1 rounded-0 input-photo-ong" data-form="photo-pet-<?=$data['pet']['id']?>" name="photo" id="input_photo_<?=$data['pet']['id']?>" style="flex: 1"/> 
            </form>
        </div>

        <form class="w-100" action="/pet/<?=$data['pet']['id']?>/edit" method="POST">
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Nome do PET *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="name" <?= isset($data['pet']['name']) ? 'value="'.$data['pet']['name'].'"' : '' ?> id="" placeholder="Nome do Pet" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['name']) ? $_SESSION['feedback']['name'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Espécie *</label>
                    <select name="especie" required="true" id="" class="form-control">
                        <option value="">Espécie</option>
                        <option value="Cachorro" <?= isset($data['pet']['especie']) && $data['pet']['especie'] == 'Cachorro' ? 'selected' : '' ?>>Cachorro</option>
                        <option value="Gato" <?= isset($data['pet']['especie']) && $data['pet']['especie'] == 'Gato' ? 'selected' : '' ?>>Gato</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['especie']) ? $_SESSION['feedback']['especie'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Porte *</label>
                    <select name="porte" required="true" id="" class="form-control">
                        <option value="">Porte</option>
                        <option value="Pequeno" <?= isset($data['pet']['porte']) && $data['pet']['porte'] == 'Pequeno' ? 'selected' : '' ?>>Pequeno</option>
                        <option value="Médio" <?= isset($data['pet']['porte']) && $data['pet']['porte'] == 'Médio' ? 'selected' : '' ?>>Médio</option>
                        <option value="Grande" <?= isset($data['pet']['porte']) && $data['pet']['porte'] == 'Grande' ? 'selected' : '' ?>>Grande</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['porte']) ? $_SESSION['feedback']['porte'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Sexo *</label>
                    <select name="sexo" required="true" id="" class="form-control">
                        <option value="">Sexo</option>
                        <option value="Macho" <?= isset($data['pet']['sexo']) && $data['pet']['sexo'] == 'Macho' ? 'selected' : '' ?>>Macho</option>
                        <option value="Fêmea" <?= isset($data['pet']['sexo']) && $data['pet']['sexo'] == 'Fêmea' ? 'selected' : '' ?>>Fêmea</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['sexo']) ? $_SESSION['feedback']['sexo'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Raça *</label>
                    <input type="text" maxlength="255" required="true" class="form-control" name="raca" <?= isset($data['pet']['raca']) ? 'value="'.$data['pet']['raca'].'"' : '' ?> id="" placeholder="Raça" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['raca']) ? $_SESSION['feedback']['raca'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Castrado *</label>
                    <select name="castrado" required="true" id="" class="form-control">
                        <option value="">Castrado</option>
                        <option value="Sim" <?= isset($data['pet']['castrado']) && $data['pet']['castrado'] == 'Sim' ? 'selected' : '' ?>>Sim</option>
                        <option value="Não" <?= isset($data['pet']['castrado']) && $data['pet']['castrado'] == 'Não' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['castrado']) ? $_SESSION['feedback']['castrado'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Idade *</label>
                    <input type="number" maxlength="255" required="true" class="form-control" name="idade" <?= isset($data['pet']['idade']) ? 'value="'.$data['pet']['idade'].'"' : '' ?> id="" placeholder="Idade" />
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['idade']) ? $_SESSION['feedback']['idade'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Vacinado *</label>
                    <select name="vacinado" required="true" id="" class="form-control">
                        <option value="">Vacinado</option>
                        <option value="Sim" <?= isset($data['pet']['vacinado']) && $data['pet']['vacinado'] == 'Sim' ? 'selected' : '' ?>>Sim</option>
                        <option value="Não" <?= isset($data['pet']['vacinado']) && $data['pet']['vacinado'] == 'Não' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['vacinado']) ? $_SESSION['feedback']['vacinado'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label for="">Foi adotado? *</label>
                    <select name="adotado" required="true" id="" class="form-control">
                        <option value="">Adotado</option>
                        <option value="1" <?= isset($data['pet']['adotado']) && $data['pet']['adotado'] == '1' ? 'selected' : '' ?>>Sim</option>
                        <option value="0" <?= isset($data['pet']['adotado']) && $data['pet']['adotado'] == '0' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['adotado']) ? $_SESSION['feedback']['adotado'] : '' ?></span>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="">Permitir visibilidade pública *</label>    
                    <select name="visible" required="true" id="" class="form-control">
                        <option value="">Visível</option>
                        <option value="1" <?= isset($data['pet']['visible']) && $data['pet']['visible'] == '1' ? 'selected' : '' ?>>Sim</option>
                        <option value="0" <?= isset($data['pet']['visible']) && $data['pet']['visible'] == '0' ? 'selected' : '' ?>>Não</option>
                    </select>
                    <span class="incorrect-feedback"><?= isset($_SESSION['feedback']['visible']) ? $_SESSION['feedback']['visible'] : '' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="">Descrição do Pet</label>  
                    <textarea maxlength="60000" name="descricao" class="form-control" id="" rows="5" placeholder="Descrição"><?= isset($data['pet']['descricao']) ? $data['pet']['descricao'] : '' ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 mb-0 text-right">
                    <button type="submit" class="btn register-ong-btn pull-right"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</b></button>
                </div>
            </div>
        </form>
    </div>
    <br />
    <div class="container">    
        <form action="/pet/<?=$data['pet']['id']?>/galeria" method="POST" enctype="multipart/form-data">
            <div class="row" id="galeria-inputs">
                <div class="col-12 col-md-3 mb-2">
                    <div class="img-box item-galeria">
                        <img src="/upload/pet/<?=$data['galerias'][0]['photo']?>" alt="Insira uma imagem" class="img-responsive" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'">
                        <label class="overlay" for="galeria-1">Selecione a foto</label>
                        <input type="file" name="galeria_1" class="input-galeria" id="galeria-1" /> 
                    </div>
                    <?php if( isset($data['galerias'][0]) ){ ?>
                    <a class="remove-item-galeria" href="/galeria/<?=$data['galerias'][0]['id']?>/delete" rel="noopener noreferrer"><i class="fa fa-times" aria-hidden="true"></i> Remover imagem da galeria</a>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="img-box item-galeria">
                        <img src="/upload/pet/<?=$data['galerias'][1]['photo']?>" alt="Insira uma imagem" class="img-responsive" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'">
                        <label class="overlay" for="galeria-2">Selecione a foto</label>
                        <input type="file" name="galeria_2" class="input-galeria" id="galeria-2" /> 
                    </div>
                    <?php if( isset($data['galerias'][1]) ){ ?>
                    <a class="remove-item-galeria" href="/galeria/<?=$data['galerias'][1]['id']?>/delete" rel="noopener noreferrer"><i class="fa fa-times" aria-hidden="true"></i> Remover imagem da galeria</a>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="img-box item-galeria">
                        <img src="/upload/pet/<?=$data['galerias'][2]['photo']?>" alt="Insira uma imagem" class="img-responsive" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'">
                        <label class="overlay" for="galeria-3">Selecione a foto</label>
                        <input type="file" name="galeria_3" class="input-galeria" id="galeria-3" /> 
                    </div>
                    <?php if( isset($data['galerias'][2]) ){ ?>
                    <a class="remove-item-galeria" href="/galeria/<?=$data['galerias'][2]['id']?>/delete" rel="noopener noreferrer"><i class="fa fa-times" aria-hidden="true"></i> Remover imagem da galeria</a>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="img-box item-galeria">
                        <img src="/upload/pet/<?=$data['galerias'][3]['photo']?>" alt="Insira uma imagem" class="img-responsive" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'">
                        <label class="overlay" for="galeria-4">Selecione a foto</label>
                        <input type="file" name="galeria_4" class="input-galeria" id="galeria-4" /> 
                    </div>
                    <?php if( isset($data['galerias'][3]) ){ ?>
                    <a class="remove-item-galeria" href="/galeria/<?=$data['galerias'][3]['id']?>/delete" rel="noopener noreferrer"><i class="fa fa-times" aria-hidden="true"></i> Remover imagem da galeria</a>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 mb-0 text-right">
                    <button type="submit" class="btn register-ong-btn pull-right"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Salvar Galeria</b></button>
                </div>
            </div>
        </form>
    </div>

    <!-- LIMPAR SESSIONS -->
    <?php

        unset($data['pet']);
        unset($_SESSION['feedback']);

    ?>

</section>

<script>
    // AO INSERIR A FOTO DO PET JÁ CARREGAR
    $(".input-photo-ong").on("change", function(){ 
        id = "#"+$(this).data('form');
        console.log(id);
        $(id).submit();
    });
    // FUNÇÃO DE AO INSERIR UMA FOTO NO INPUT DA GALERIA INSERIR O TEXTO DELA NA IMAGEM
    $('body').on('change', '.input-galeria', function() {
        filename = this.files[0].name
        $(this).prev().text(filename);
    });
    $("#add-more-inputs-galeria").click(function(){
        var item_galeria = $(".item-galeria").length + 1;
        $("#galeria-inputs").append(`
            <div class="col-12 col-md-3 mb-2">
                <div class="img-box item-galeria">
                    <img src="/img/default-ong-logo.png" alt="Insira uma imagem" class="img-responsive">
                    <label class="overlay" for="galeria-`+item_galeria+`">Selecione a foto</label>
                    <input type="file" name="galeria_`+item_galeria+`" class="input-galeria" id="galeria-`+item_galeria+`" /> 
                </div>
            </div>
        `);
    });

</script>