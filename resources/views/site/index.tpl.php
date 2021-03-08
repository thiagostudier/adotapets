<!-- BANNER MOBILE -->
<div class="banner-mobile">
    <div class="container"></div>
</div>

<!-- SEARCH -->
<section class="search search-desktop">
    <div class="container px-0">
        <div class="search-dogs search-dogs-animate">
            <div class="search-dogs-header">
                <div class="search-dogs-label">
                    <p><i class="fa fa-search" aria-hidden="true"></i> Encontre seu novo amigo</p>
                </div>
                <div class="search-dogs-desc">
                    <p><b>+ 8 mil</b> animais cadastrados</p>
                </div>
            </div>
            <!-- SEARCH -->
            <?php include __DIR__ . '/../includes/search.inc.php' ?>
            <!-- end SEARCH -->
        </div>
        <!-- CADASTRE SUA ONG -->
        <?php include __DIR__ . '/../includes/cadastre-sua-ong.inc.php' ?>
        <!-- end CADASTRE SUA ONG -->
    </div>
</section>

<!-- SEARCH MOBILE -->
<section class="search search-modile search-dog-page search-dog-page-hide-mobile">
    <div class="container px-0">
        <div class="search-dogs search-dogs-animate">
            <div class="search-dogs-header">
                <div class="search-dogs-label">
                    <p><i class="fa fa-search" aria-hidden="true"></i> Encontre seu novo amigo</p>
                </div>
                <div class="search-dogs-desc">
                    <p><b>+ 8 mil</b> animais cadastrados</p>
                </div>
            </div>
            <!-- SEARCH -->
            <?php include __DIR__ . '/../includes/search.inc.php' ?>
            <!-- end SEARCH -->
        </div>
    </div>
</section>

<!-- PETS -->
<section class="pets">
    <div class="container px-0">

        <div class="pets-header">
            <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Esperando por você</b></h2>
            <!-- <a class="pets-heade-plus" href=""><i class="fa fa-plus" aria-hidden="true"></i></a> -->
        </div>
        <div class="pets-cards row">
            <?php foreach($data['pets'] as $pet){ ?>
            <div class="pets-card col-sm-4 col-md-3 col-6">
                <a href="/pet/<?=$pet['id']?>" title="<?=$pet['name']?>">
                <div class="pets-card-img">
                    <img src="/upload/pet/<?=$pet['photo']?>" alt="<?=$pet['name']?>" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" />
                    <span class="pets-card-img-porte"><?=$pet['porte'][0]?></span>
                </div>
                </a>
                <div class="pets-card-desc">
                    <h2 class="pets-card-desc-name color-purple"><b><?=$pet['name']?></b></h2>
                    <p class="pets-card-desc-local"><?=$data['container']['ongs_model']->get(['id'=>$pet['id_ong']])['cidade'] . " - " . $data['container']['ongs_model']->get(['id'=>$pet['id_ong']])['estado'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section>

<!-- ADOTADOS -->
<section class="adotados">
    <div class="container px-0">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Adotados</b></h2>
        <div class="carousel-pets">
            <?php foreach($data['adotados'] as $adotado){ ?>
            <div class="item-carousel-pets">
                <div class="pets-card-img">
                    <a href="/pet/<?=$adotado['id']?>" title="<?=$adotado['name']?>">
                        <img class="img-responsive load-img" src="/upload/pet/<?=$adotado['photo']?>" alt="Imagem" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" />
                        <span class="pets-card-img-porte"><?=$adotado['porte'][0]?></span>
                        <span class="pets-label-adotado">ADOTADO</span>
                    </a>
                </div>
                <div class="pets-card-desc">
                    <h2 class="pets-card-desc-name color-purple"><b><?=$adotado['name']?></b></h2>
                    <p class="pets-card-desc-local"><?=$data['container']['ongs_model']->get(['id'=>$adotado['id_ong']])['cidade'] . " - " . $data['container']['ongs_model']->get(['id'=>$adotado['id_ong']])['estado'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section>

<!-- DOGS FIXED -->
<!-- <img class="pet-fixed pet-fixed-left" src="/img/dog-left.png" alt="CACHORRO" />
<img class="pet-fixed pet-fixed-right" src="/img/dog-right.png" alt="GATO" /> -->
