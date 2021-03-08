<div class="search-dogs-form">
    <form class="form-inline" action="/search" METHOD="POST">
        <div class="form-group flex-fill pl-3 pr-3">
            <select name="especie" id="" class="form-control">
                <option value="">Espécie</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Gato">Gato</option>
            </select>
        </div>
        <div class="form-group flex-fill pr-3">
            <select name="sexo" id="" class="form-control">
                <option value="">Sexo</option>
                <option value="Fêmea">Fêmea</option>
                <option value="Macho">Macho</option>
            </select>
        </div>
        <div class="form-group flex-fill pr-3">
            <select name="porte" id="" class="form-control">
                <option value="">Porte</option>
                <option value="Pequeno">Pequeno</option>
                <option value="Médio">Médio</option>
                <option value="Forte">Forte</option>
            </select>
        </div>
        <div class="form-group flex-fill pr-3">
            <input type="number" name="idade" class="form-control" placeholder="Idade"/>
        </div>
        <div class="form-group flex-fill pr-3">
            <select name="estado" id="" class="form-control uf">
            </select>
        </div>
        <div class="form-group flex-fill pr-3">
            <select name="cidade" id="" class="form-control municipio">
                <option value="">Município</option>
            </select>
        </div>
        <div class="form-group pr-3 mb-0">
            <button type="submit" class="btn search-dogs-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </form>
</div>