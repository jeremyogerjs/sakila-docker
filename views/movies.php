  <div class=" d-flex justify-content-between col-3 mx-auto">

    <?php foreach ($params['store'] as $item) : ?>
      <a href="/films/store/<?= $item -> store_id ?>">
        <buton class="btn btn-primary">magasin <?= $item -> store_id ?></buton>
      </a>
    <?php endforeach ?>
  </div>

  <div class="d-flex">
    <form action="/films/categories" method="POST">
        <select class="form-select" name="categorie" aria-label="Default select example">
          <option selected>Selectionner une catégorie</option>
          <?php foreach($params['categories'] as $item) : ?>
            <option value="<?= $item -> category_id ?>"><?= $item -> name ?></option>
          <?php endforeach ?>
        </select>
        <button class="btn btn-outline-success" type="submit">Filrer</button>
    </form>
  </div>

  <div class="mx-auto col-4 p-3">
    <form class="d-flex mx-auto" method="POST" action="/films/search">
        <input class="form-control me-2" name="query" type="search" placeholder="Rechercher par titre" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>

<table class="table w-75 mx-auto">
  <thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Durée</th>
      <th scope="col">Coût de remplacement</th>
      <th scope="col">Prix</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php if(!empty($params['data'])) : ?>
      <?php foreach($params['data'] as $movies) : ?>
          <tr>
              <td ><?= $movies->title ?></td>
              <td ><?= $movies->name ?></td>
              <td ><?= $movies->length ?> min</td>
              <td ><?= $movies->replacement_cost ?></td>
              <td ><?= $movies->rental_rate ?> $</td>
              <td >
                <a href="/films/<?= $movies ->film_id ?>">
                <button class="btn btn-outline-success">
                  Voir
                </button>
                </a>
                <a href="/locations/<?= $movies ->film_id ?>">
                <button class="btn btn-outline-success">
                  Locations
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