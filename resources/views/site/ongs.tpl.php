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
        <?php foreach($data['ongs'] as $data['ong']){ ?>
        <div class="row mb-3">
            <?php include __DIR__ . '/../includes/ong.inc.php'  ?>
        </div>
        <?php } ?>
    </div>
</section>