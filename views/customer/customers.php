<h4 class="title text-center">Liste des clients</h4>
  <div class="mx-auto col-5 p-3">
    <form class="d-flex mx-auto" method="POST" action="/clients/search">
        <input class="form-control me-2" name="query" type="search" placeholder="Rechercher par nom/prénom" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>

<table class="table w-75 mx-auto">
  <thead>
    <tr>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($params['data'])) : ?>
      <?php foreach($params['data'] as $item) : ?>
          <tr>
              <td ><?= $item->first_name ?></td>
              <td ><?= $item->last_name ?></td>
              <td ><?= $item->email ?> min</td>
              <td >
                <a href="/clients/<?= $item ->customer_id ?>">
                <button class="btn btn-outline-primary">
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