<h3 class="title text-center"> Location pour le film : <?= $params['movie'][0] -> title ?> </h3>

<div class="col-5 card p-3 my-5 mx-auto">
    <form action="/films/<?= $params['movie'][0] -> film_id ?>/location" method="post">
        <div class="mb-3">
            <label class="form-label" for="rental_date">Date de location</label>
            <input class="form-control" type="datetime-local" name="rental_date">
        </div>
        <div class="mb-3">
            <select class="form-select" name="customer_id" aria-label="Default select example">
                <option selected >Sélectionner le client</option>
                <?php foreach($params['customers'] as $item) : ?>
                    <option value="<?= $item -> customer_id ?>"><?= $item ->first_name ?> <?= $item -> last_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" name="staff_id" aria-label="Default select example">
                <option selected >Pris en charge par </option>
                <?php foreach($params['staff'] as $item) : ?>
                    <option value="<?= $item -> staff_id ?>"><?= $item ->first_name ?> <?= $item -> last_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" hidden name="inventory_id" value="<?= $params['movie'][0] -> inventory_id ?>">
        </div>
        <div class="d-flex justify-content-between">
            <a href="/films/<?= $params['movie'][0] -> film_id ?>">
                <button type="button" class="btn btn-danger">Annuler</button>
            </a>
            <button type="submit" class="btn btn-success">Valider</button>
        </div>
    </form>
</div>