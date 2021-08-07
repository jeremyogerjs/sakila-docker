<?php session_start() ?>
<?php ob_start() ?>
<div class="col-4">
<form class="d-flex" method="POST" action="index.php?target=films&store=<?= $_GET['store'] ?>">
    <input class="form-control me-2" name="query" type="search" placeholder="Rechercher par acteur,titre" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<div class=" d-flex justify-content-between">
    <buton class="btn btn-primary"><a href="index.php?target=films&store=1" class="link-light text-decoration-none">magasin 1</a></buton>
    <buton class="btn btn-primary"><a href="index.php?target=films&store=2"class="link-light text-decoration-none">magasin 2</a></buton>
</div>
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">titre</th>
      <th scope="col">description</th>
      <th scope="col">durée</th>
      <th scope="col">coût de remplacement</th>
      <th scope="col">rating</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $movies) : ?>
        <tr>
            <td ><?= $movies->title ?></td>
            <td ><?= $movies->description ?></td>
            <td ><?= $movies->length ?> min</td>
            <td ><?= $movies->replacement_cost ?></td>
            <td ><?= $movies->rating ?></td>
        </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php $content = ob_get_clean() ?>

<?php require('layout.php') ?>