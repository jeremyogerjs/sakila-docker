<h3 class="title text-center">Location pour le film : <?= $params['rentals'][0]->title ?></h3>
<div class="d-flex">
  <div class="d-flex flex-column">
    <a href="/locations/<?= $params['rentals'][0]->rental_id ?>/edit" class="text-decoration-none mb-3 <?= $params['rentals'][0]->return_date != NULL ? 'pe-none' : '' ?>">
      <button class="btn btn-primary" <?= $params['rentals'][0]->return_date != NULL ? 'disabled' : '' ?>>Rendre</button>
    </a>
    <a href="/locations" class="text-decoration-none">
      <button class="btn btn-warning">Retour a la liste</button>
    </a>
  </div>
  <div class="card col-8 mx-auto">
    <div class="card-header d-flex justify-content-between">
      <p class="card-text">Prix de la location <?= $params['rentals'][0]->rental_rate ?> $</p>
    </div>
    <div class="card-body d-flex">
      <div>
        <p class="card-text">Louer par : <?= $params['rentals'][0]->customerFirstName ?> <?= $params['rentals'][0]->customerLastName ?></p>
        <p class="card-text">Mail : <?= $params['rentals'][0]->email ?></p>
      </div>
      <div class="ms-4">
        <p class="card-text">Louer le : <?= date('d/m/Y', strtotime($params['rentals'][0]->rental_date)) ?></p>
        <?php if ($params['rentals'][0]->return_date != NULL) : ?>
          <p class="card-text">Rendu le : <?= date('d/m/Y', strtotime($params['rentals'][0]->return_date)) ?></p>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>