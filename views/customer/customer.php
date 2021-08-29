<div class="card w-50 mx-auto my-3">
    <div class="card-header">
        <h5 class="card-title"> <?= $params['data'][0]->first_name ?> <?= $params['data'][0]->last_name ?></h5>
        <h6 class="card-subtitle text-muted"><?= $params['data'][0]->email ?></h6>
        <p class="card-text">Tel : <?= $params['data'][0]->phone ?></p>
    </div>
    <div class="card-body">
        <p class="card-text fw-bold fst-italic text-uppercase text-center">Addresse</p>
        <div class="d-flex justify-content-around">
            <p class="card-text">Rue : <?= $params['data'][0]->address ?> </p>
            <p class="card-text"> Quartier : <?= $params['data'][0]->district ?></p>
        </div>
        <p class="card-text">Code postal : <?= $params['data'][0]->postal_code ?></p>
        <p class="card-text">Ville : <?= $params['data'][0]->city ?></p>
        <p class="card-text">Pays : <?= $params['data'][0]->country ?></p>
    </div>
    <a href="/clients" class="p-3"><button class="btn btn-warning text-dark p-2">Retour a la liste</button></a>
</div>