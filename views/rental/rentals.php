
<h3 class="text-center">Toute les locations</h3>


<table class="table w-75 mx-auto">
  <thead>
    <tr>
      <th scope="col">Date de location</th>
      <th scope="col">Nom prénon du loueur</th>
      <th scope="col">Nom prénom du staff</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php if(!empty($params['rentals'])) : ?>
      <?php foreach($params['rentals'] as $rental) : ?>
          <tr>
              <td ><?= $rental->rental_date ?></td>
              <td ><?= $rental->customerFirstName ?> <?= $rental->customerLastName ?></td>
              <td ><?= $rental->first_name ?> <?= $rental->last_name ?></td>
              <td >
                <a href="/locations/<?= $rental ->rental_id ?>">
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

