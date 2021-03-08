<div class="col-12 col-md-2 px-0">
    <a href="/ong/<?=$data['ong']['slug']?>">
    <div class="img-box">
        <img src="/upload/ong/<?=$data['ong']['photo']?>" alt="<?=$data['ong']['name']?> - Logo" onerror="this.onerror=null;this.src='/img/default-ong-logo.png'" class="img-responsive">
    </div>
    </a>
</div>
<div class="col-12 col-md-8 descricao-ong">
    <h3>
        <a href="/ong/<?=$data['ong']['slug']?>"><span class="ong-title"><?=$data['ong']['name']?></span></a>
        <a href="https://www.google.com/maps?q=<?=$data['ong']['rua'].' '.$data['ong']['numero'].' '.$data['ong']['bairro'].' '.$data['ong']['cidade']?>" target="_blank" class="ong-how-checking"><i class="fa fa-map-marker" aria-hidden="true"></i> Como chegar</a>
    </h3>
    <div class="col-12 px-0 px-md-2">
        <p><?=$data['ong']['rua'] != '' ? $data['ong']['rua'] : '(rua)'?>, <?=$data['ong']['numero'] != '' ? $data['ong']['numero'] : '(número)'?> - <?=$data['ong']['cidade'] != '' ? $data['ong']['cidade'] : '(cidade)'?> - <?=$data['ong']['estado'] != '' ? $data['ong']['estado'] : '(estado)'?> <br>
        <?=$data['ong']['telefone'] != '' ? $data['ong']['telefone']. ' • ' : '(telefone) • '?><?=$data['ong']['celular'] != '' ? $data['ong']['celular'] : '(celular)'?></br>
        <?=$data['ong']['site'] != '' ? $data['ong']['site'] . ' • ' : '(site) • '?><?=$data['ong']['mail'] != '' ? $data['ong']['mail'] : '(e-mail)'?></p>
        <div class="social-media footer-info-social-media">
            <?=$data['ong']['facebook'] ? '<a href="'.$data['ong']['facebook'].'" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-facebook" aria-hidden="true"></i></a>' : ''?>
            <?=$data['ong']['twitter'] ? '<a href="'.$data['ong']['twitter'].'" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-twitter" aria-hidden="true"></i></a>' : ''?>
            <?=$data['ong']['instagram'] ? '<a href="'.$data['ong']['instagram'].'" target="_blank" class="color-white mr-2"><i class="navbar-icon fa fa-instagram" aria-hidden="true"></i></a>' : ''?>
        </div>
    </div>
</div>
<div class="col-12 col-md-2 ong-number-dogs">
    <div>
        <h1><b><?=count($data['container']['pets_model']->all(['id_ong'=>$data['ong']['id']]))?></b></h1>
        <p>animais <br /> cadastrados</p>
    </div>
</div>