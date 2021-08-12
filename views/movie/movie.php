<div class="my-4 d-flex justify-content-around">
    <div>
        <a href="/films/<?=$params['data'][0] -> film_id ?>/location">
            <button class="btn btn-success">Louer <span class=""><?= $params['data'][0] -> rental_rate ?> $</span> </button>
        </a>
    </div>
    <div class="card col-8">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <p class="fw-bold"><?= $params['data'][0] -> title ?></p>
                <p class="text-muted"><?= $params['data'][0] ->length ?> min</p>
            </div>
        </div>
        <div class="card-body">
            <p class="fw-bold">Description : </p>
            <p class="card-text">
                <?= $params['data'][0] -> description ?>
            </p>
            <p class="fw-bold"> Bonus : </p>
            <p class="card-text"> <?= $params['data'][0] -> special_features ?> </p>
            <p class="card-text fw-bold">Acteurs :</p>
            <p class="card-text text-lowercase"> 
            <?php foreach($params['data'] AS $actor) : ?>
                <?= $actor -> first_name ?> <?= $actor -> last_name ?>,
            <?php endforeach ?>
            </p>
        </div>
        <div class="card-footer text-muted text-center">  
            <?= $params['data'][0] -> name ?>
        </div>
    </div>
</div>