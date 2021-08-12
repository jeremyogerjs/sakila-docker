<h3 class="title text-center">Location pour le film : <?= $params['rentals'][0] -> title ?></h3>


<div class="card col-4">
    <div class="card-header">
        <p class="card-text">Prix de la location <?= $params['rentals'][0] -> rental_rate ?> $</p>
    </div>
</div>

<table class="table mx-auto">
  <thead>
    <tr>
      <th scope="col">Date de location</th>
      <th scope="col">Louer par</th>
      <th scope="col">Email contact</th>
      <th scope="col">Pris en charge par</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php if(!empty($params['rentals'])) : ?>
      <?php foreach($params['rentals'] as $rental) : ?>
          <tr>
              <td ><?= $rental->rental_date ?></td>
              <td ><?= $rental->customerFirstName ?> <?= $rental->customerLastName ?></td>
              <td ><?= $rental->email ?> </td>
              <td ><?= $rental->first_name ?> <?= $rental->last_name ?></td>
              <td >
                <a href="/clients/<?= $rental ->customer_id ?>" class="text-decoration-none">
                  <button class="btn btn-outline-success">
                    Voir client
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