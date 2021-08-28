  <div class="mx-auto p-3">
    <form class="d-flex mx-auto justify-content-center align-items-center" method="POST" action="/films/search">
      <div class="">
        <select class="form-select" name="categorie" aria-label="Catégorie">
          <option value="" selected>Catégorie</option>
          <?php foreach ($params['categories'] as $item) : ?>
            <option value="<?= $item->category_id ?>"><?= $item->name ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class=" w-50 d-flex">
        <input class="form-control m-2 " name="query" type="search" placeholder="Renseigner le titre du film" aria-label="Rechercher">
        <button class="btn btn-warning" type="submit">Rechercher</button>
      </div>

    </form>
    <p class="text-muted fst-italic text-center mt-2">*Tips : Pour rechercher par catégorie, sélectionner s'en une et appuyer sur le bouton rechercher</p>
  </div>

  <table class="table mx-auto caption-top table-hover">
    <caption>Liste des films</caption>
    <thead class="table-dark">
      <tr class="text-center">
        <th scope="col">Titre</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Durée</th>
        <th scope="col">Disponible</th>
        <th scope="col">nb en stock</th>
        <th scope="col">Prix</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($params['data'])) : ?>
        <?php foreach ($params['data'] as $movies) : ?>
          <tr class="text-center">
            <td><?= $movies->title ?></td>
            <td><?= $movies->name ?></td>
            <td><?= $movies->length ?> min</td>
            <td><?= $movies->nbrFilmLoc < $movies->nbrFilmTot ? 'Disponible' : 'Indisponible' ?></td>
            <td><?php $nbr = $movies->nbrFilmTot - $movies->nbrFilmLoc;
                echo $nbr ?></td>
            <td><?= $movies->rental_rate ?> $</td>
            <td class="d-flex justify-content-around">
              <a href="/films/<?= $movies->inventory_id ?>" class="text-decoration-none">
                <button class="btn btn-primary">
                  Voir
                </button>
              </a>
              <a href="/location/film/<?= $movies->inventory_id ?>" class="text-decoration-none <?= $movies->nbrFilmTot > $movies->nbrFilmLoc ? '' : 'pe-none' ?>">
                <button class="btn btn-success" <?= $movies->nbrFilmTot > $movies->nbrFilmLoc ? '' : 'disabled' ?>>Louer <span class=""><?= $movies->rental_rate ?> $</span> </button>
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      <?php else : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Aucun résultat</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>
    </tbody>
  </table>