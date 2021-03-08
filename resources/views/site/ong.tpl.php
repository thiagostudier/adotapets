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
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Pets da Ong</b></h2>
        <div class="row">
            <?php include __DIR__ . '/../includes/ong.inc.php'  ?>
        </div>
    </div>
</section>

<!-- PETS -->
<section class="pets-ong">
    <div class="container px-0">
        <h2 class="pets-title title-in-mobile"><b><i class="fa fa-paw" aria-hidden="true"></i> Animais da ONG</b></h2>
        <div class="pets-cards row">
            <?php foreach($data['pets'] as $pet){ ?>
            <div class="pets-card col-sm-4 col-md-3 col-6 <?= $pet['adotado'] ? 'adotados' : '' ?>">
                <a href="/pet/<?=$pet['id']?>" title="<?=$pet['name']?>">
                <div class="pets-card-img">
                    <img src="/upload/pet/<?=$pet['photo']?>" alt="<?=$pet['name']?>" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" />
                    <span class="pets-card-img-porte"><?=$pet['porte'][0]?></span>
                    <?php if($pet['adotado']){ ?>
                    <span class="pets-label-adotado">ADOTADO</span>
                    <?php } ?>
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

<!-- COMO CHEGAR -->
<section class="como-chegar">
    <div class="container">
        <h2 class="pets-title"><b><i class="fa fa-paw" aria-hidden="true"></i> Como chegar</b></h2>    
        <iframe width="100%" height="400px" style="border: 4px solid #ededec;border-radius: 7px;" src="https://www.google.com/maps?q=<?= $data['ong']['rua'] . ' ' . $data['ong']['numero'] . ' ' . $data['ong']['bairro']  . ' ' . $data['ong']['cidade'] ?>&output=embed"></iframe>
    </div>
</section>
