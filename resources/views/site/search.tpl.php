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

<!-- PETS -->
<section class="pets">
    <div class="container px-0">

        <div class="pets-header">
            <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Pets pesquisados: </b></h2>
            <!-- <a class="pets-heade-plus" href=""><i class="fa fa-plus" aria-hidden="true"></i></a> -->
        </div>
        <?php if($data['pesquisa']){?>
        <p><?=$data['pesquisa']?></p>
        <?php } ?>
        <div class="pets-cards row">
            
            <?php foreach($data['pets'] as $pet){ ?>
            <div class="<?= $pet['adotado'] ? 'adotados' : '' ?> pets-card col-sm-4 col-md-3 col-6">
                <a href="/pet/<?=$pet['id']?>" title="<?=$pet['name']?>">
                <div class="pets-card-img">
                    <img src="/upload/pet/<?=$pet['photo']?>" alt="<?=$pet['name']?>" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" />
                    <span class="pets-card-img-porte"><?=$pet['porte'][0]?></span>
                    <?= $pet['adotado'] ? '<span class="pets-label-adotado">ADOTADO</span>' : '' ?>
                </div>
                </a>
                <div class="pets-card-desc">
                    <h2 class="pets-card-desc-name color-purple"><b><?=$pet['name']?></b></h2>
                    <p class="pets-card-desc-local"><?=$data['container']['ongs_model']->get(['id'=>$pet['id_ong']])['cidade'] . " - " . $data['container']['ongs_model']->get(['id'=>$pet['id_ong']])['estado'] ?></p>
                </div>
            </div>
            <?php } ?>
            <?= empty($data['pets']) ? '<div class="col-12 mb-5"><p class="text-center">Nenhum pet encontrado</p></div>' : '' ?>
        </div>

    </div>
</section>