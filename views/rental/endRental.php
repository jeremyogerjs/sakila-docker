<div class="card shadow p-4 m-3">
    <h3 class="title">Rendre location pour le film: <?= $params['rentals'][0]->title ?> </h3>
    <form action="/locations/<?= $params['rentals'][0]->rental_id ?>/edit" method="POST">
        <div class="mb-3 col-4">
            <label for="return_date" class="form-label">Rendu le *</label>
            <input type="datetime-local" class="form-control" name="return_date" id="return_date" aria-describedby="return_dateHelp" required>
            <div id="return_dateHelp" class="form-text">Entrez la date de retour</div>
        </div>
        <div>
            <p class="text-muted">*Champs obligatoire</p>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

    <div class="pt-3">
        <h4 class="title">Récapitulatif réservation</h4>
        <p><span class="text-muted">prix: </span><?= $params['rentals'][0]->rental_rate ?> $</p>
        <p>
            <span class="text-muted">Loué par</span>
            <?= $params['rentals'][0]->customerFirstName ?> <?= $params['rentals'][0]->customerLastName ?>
            <span class="text-muted">le: </span><?= $params['rentals'][0]->rental_date ?>
        </p>
        <p><span class="text-muted">Contact: </span><?= $params['rentals'][0]->email ?></p>
    </div>
</div>