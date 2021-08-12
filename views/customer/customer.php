
<div class="card w-50 mx-auto my-3">
    <div class="card-header">
        <h5 class="card-title"> <?= $params['data'] -> first_name ?> <?= $params['data'] -> last_name ?></h5>
        <h6 class="card-subtitle text-muted"><?= $params['data'] -> email ?></h6>
        <p class="card-text">Tel : <?= $params['data'] -> phone ?></p>
    </div>
    <div class="card-body">
        <p class="card-text fw-bold fst-italic text-uppercase text-center">Addresse</p>
        <div class="d-flex justify-content-around">
            <p class="card-text">Rue : <?= $params['data'] -> address ?> </p>
            <p class="card-text"> Quartier : <?= $params['data'] -> district ?></p>
        </div>
        <p class="card-text">Code postal : <?= $params['data'] -> postal_code ?></p>
        <p class="card-text">Ville : <?= $params['data'] -> city ?></p>
        <p class="card-text">Pays : <?= $params['data'] -> country ?></p>
    </div>
    <a href="/clients" class="p-3"><button class="btn btn-warning text-dark p-2">Retour a la liste</button></a>
</div>