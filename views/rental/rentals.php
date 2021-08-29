<h3 class="text-center py-3">Toute les locations</h3>

<form action="/locations/search" method="POST" class="form">
  <div class="d-flex w-50 mx-auto">
    <input class="form-control me-2 " name="query" type="search" placeholder="Rechercher par nom/prenom client ou par film" aria-label="Rechercher">
    <button class="btn btn-outline-primary" type="submit">Rechercher</button>
  </div>
</form>
<table class="table mx-auto">
  <thead>
    <tr>
      <th scope="col">Date de location</th>
      <th scope="col">Statut</th>
      <th scope="col">Louer par</th>
      <th scope="col">Titre du film</th>
      <th scope="col">Staff</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($params['rentals'])) : ?>
      <?php foreach ($params['rentals'] as $rental) : ?>
        <tr>
          <td><?= date('d/m/Y', strtotime($rental->rental_date)) ?></td>
          <td><?= isset($rental->return_date) ? 'Terminé'  : 'En cours' ?></td>
          <td><?= $rental->customerFirstName ?> <?= $rental->customerLastName ?></td>
          <td><?= $rental->title ?></td>
          <td><?= $rental->first_name ?> <?= $rental->last_name ?></td>
          <td>
            <a href="/locations/<?= $rental->rental_id ?>" class="text-decoration-none">
              <button class="btn btn-outline-success">
                Voir
              </button>
            </a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php else : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Acun résultat</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
  </tbody>
</table>