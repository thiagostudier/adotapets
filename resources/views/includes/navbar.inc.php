<div class="overflow-hidden">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top p-0 p-md-0">
        <div class="container">

            <a class="navbar-brand" href="/">
                <img src="/img/logo-pets.png" width="auto" height="70" alt="">
            </a>

            <button class="navbar-toggler navbar-toggler-search" type="button">
                <h2 class="mb-0"><i class="fa fa-search" aria-hidden="true"></i></h2>
            </button>
            
            <button class="navbar-toggler navbar-toggler-menu" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <h2 class="mb-0"><i class="fa fa-bars" aria-hidden="true"></i></h2>
            </button>

            <div class="w-100">
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav d-flex ml-auto">
                        <li class="nav-item flex-fill <?= ($data['active'] == 'about') ? 'active' : '' ?>">
                            <a class="nav-link" href="/sobre"><b>Sobre</b> <span class="sr-only">(current)</span></a>
                        </li>  
                        <li class="nav-item flex-fill <?= ($data['active'] == 'ong') ? 'active' : '' ?>">
                            <a class="nav-link" href="/ongs"><b>Ongs</b> <span class="sr-only">(current)</span></a>
                        </li>  
                        <li class="nav-item flex-fill <?= ($data['active'] == 'contato') ? 'active' : '' ?>">
                            <a class="nav-link" href="/contato"><b>Contato</b> <span class="sr-only">(current)</span></a>
                        </li>
                        <?php if( $data['container']['users_model']->ifLogin()){ ?>
                            <li class="nav-item flex-fill dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b><?=$_SESSION['auth']['name']?></b>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/user/ongs">Minhas ongs</a>
                                    <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
                                </div>
                            </li>
                        <?php }else{ ?>
                        <li class="nav-item flex-fill <?= ($data['active'] == 'login') ? 'active' : '' ?>">
                            <a class="nav-link" href="/entrar"><b><i class="fa fa-user-circle-o" aria-hidden="true"></i> Entrar ou cadastrar ong</b> <span class="sr-only">(current)</span></a>
                        </li>                       
                        <?php } ?>
                    </ul>
                </div> 
            </div>

        </div>
    </nav>
</div>