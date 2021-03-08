<!-- SEARCH -->
<section class="search search-dog-page search-dog-page-hide-mobile">
    <div class="container px-0">
        <!-- SEARCH -->
        <div class="search-dogs">
        <?php include __DIR__ . '/../includes/search.inc.php' ?>
        </div>
        <!-- end SEARCH -->
        <!-- CADASTRE SUA ONG -->
        <?php include __DIR__ . '/../includes/cadastre-sua-ong.inc.php' ?>
        <!-- end CADASTRE SUA ONG -->
    </div>
</section>

<!-- ONG -->
<section class="ong">
    <div class="container">
        <!-- DADOS DA ONG -->
        <div id="header-ong" class="row">
            <?php include __DIR__ . '/../includes/ong.inc.php'  ?>
        </div>
        <!-- DADOS DO PET -->
        <div class="pet-info row">

            <div class="col-12 col-md-7 px-0 ">
                <!-- CARROUSEL CABEÇALHO PET -->
                <div class="carousel-pet px-0">
                    <div class="item-carousel-pets px-0">
                        <div class="pets-card-img">
                            <img src="/upload/pet/<?=$data['pet']['photo']?>" alt="Imagem" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" class="load-img" width="100%" />
                            <span class="pets-card-img-porte"><?=$data['pet']['porte'][0]?></span>
                        </div>
                    </div>
                    <?php foreach($data['galerias'] as $galeria){ ?>
                    <div class="item-carousel-pets px-0">
                        <div class="pets-card-img">
                            <img src="/upload/pet/<?=$galeria['photo']?>" alt="Imagem" class="load-img" width="100%" />
                            <span class="pets-card-img-porte"><?=$data['pet']['porte'][0]?></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- CARROUSEL NAV PET -->
                <?php if( !empty($data['galerias']) ){ ?>
                <div class="carousel-pet-nav px-0">
                    <div class="item-carousel-pets px-0">
                        <div class="pets-card-img">
                            <img src="/upload/pet/<?=$data['pet']['photo']?>" alt="Imagem" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" class="load-img" width="100%" />
                        </div>
                    </div>
                    <?php foreach($data['galerias'] as $galeria){ ?>
                    <div class="item-carousel-pets px-0">
                        <div class="pets-card-img">
                            <img src="/upload/pet/<?=$galeria['photo']?>" alt="Imagem" class="load-img" width="100%" />
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>

            <div class="col-12 col-md-5 pl-md-4 pr-md-0 px-0">
                <div class="pet-info-desc">
                    <h2 class="pet-info-title color-purple mb-0"><b><?=$data['pet']['name']?></b></h2>
                    <p class="pet-info-local"><?=$data['ong']['cidade'] . " - " . $data['ong']['estado'] ?></p>
                </div>
                <table class="table pet-info-table mt-4 mb-5">
                    <tr>
                        <td><p><b class="color-purple">Raça:</b> <?=$data['pet']['raca']?></p></td>
                        <td><p><b class="color-purple">Porte:</b> <?=$data['pet']['porte']?></p></td>
                    </tr>
                    <tr>
                        <td><p><b class="color-purple">Castrado:</b> <?=$data['pet']['castrado']?></p></td>
                        <td><p><b class="color-purple">Idade:</b> <?=$data['pet']['idade']?> ano(s)</p></td>
                    </tr>
                    <tr>
                        <td><p><b class="color-purple">Vacinado:</b> <?=$data['pet']['vacinado']?></p></td>
                        <td><p><b class="color-purple">Sexo:</b> <?=$data['pet']['sexo']?></p></td>
                    </tr>
                    <tr>
                        <td><p><b class="color-purple">Adotado:</b> <?=$data['pet']['adotado'] ? 'Adotado' : 'Não'?></p></td>
                        <td></td>
                    </tr>
                </table>
                <?php 
                if(!empty($data['pet']['descricao'])){
                ?>
                <div class="pet-info-history">
                    <h3 class="pet-info-history-title">Minha história</h3>
                    <?=$data['pet']['descricao']?>
                </div>
                <?php 
                }
                ?>
                <!-- SHARE -->
                <!-- <div class="social-media footer-info-social-media mt-4">
                    <b class="mr-3">Compartilhe:</b>
                    <a href="#" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-instagram" aria-hidden="true"></i></a>
                </div> -->
            </div>           

        </div>
    </div>
</section>

<!-- PETS DA ONG -->
<section class="outros-animais-da-ong" style="padding: 40px 0px 10px 0px;">
    <div class="container px-0">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Outros animais da ONG</b></h2>
        <div class="carousel-pets">
            <?php foreach($data['pets'] as $pet){ ?>
                <?php if($pet['adotado']){ ?>
                <div class="adotados">
                <?php } ?>                
                <div class="item-carousel-pets">
                    <div class="pets-card-img">
                        <a href="/pet/<?=$pet['id']?>" title="<?=$pet['name']?>">
                            <img src="/upload/pet/<?=$pet['photo']?>" alt="<?=$pet['name']?>" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" />
                            <span class="pets-card-img-porte"><?=$pet['porte'][0]?></span>
                            <?php if($pet['adotado']){ ?>
                            <span class="pets-label-adotado">ADOTADO</span>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="pets-card-desc">
                    <h2 class="pets-card-desc-name color-purple"><b><?=$pet['name']?></b></h2>
                        <p class="pets-card-desc-local"><?=$data['container']['ongs_model']->get(['id'=>$pet['id_ong']])['cidade'] . " - " . $data['container']['ongs_model']->get(['id'=>$pet['id_ong']])['estado'] ?></p>
                    </div>
                </div>
                <?php if($pet['adotado']){ ?>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>

<section class="ong">
    <div class="container">
        <!-- DADOS DA ONG -->
        <div id="header-ong-mobile" class="row">
            <?php include __DIR__ . '/../includes/ong.inc.php'  ?>
        </div>
    </div>
</section>

<!-- COMO CHEGAR -->
<section class="como-chegar">
    <div class="container">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Como chegar</b></h2>    
        <iframe width="100%" height="400px" style="border: 4px solid #ededec;border-radius: 7px;" src="https://www.google.com/maps?q=<?= $data['ong']['rua'] . ' ' . $data['ong']['numero'] . ' ' . $data['ong']['bairro']  . ' ' . $data['ong']['cidade'] ?>&output=embed"></iframe>
    </div>
</section>