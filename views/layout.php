<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Sakila</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= empty($_SESSION) ? '' : 'dashboard'  ?>">SAKILA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if (empty($_SESSION)) : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/login">Login</a>
            </li>

          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="/logout" tabindex="-1">Se déconnecter</a>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </nav>
  <div class="container flex-grow-1">
    <div class="row">
      <?php if (!empty($_SESSION)) : ?>
        <div class="col-3">
          <div class="list-group m-3">
            <a href="/dashboard" class="list-group-item list-group-item-danger list-group-item-action">
              Mon profil
            </a>
            <a href="/films" class="list-group-item list-group-item-action list-group-item-danger">Films</a>
            <a href="/locations" class="list-group-item list-group-item-action list-group-item-danger">Locations</a>
            <a href="/clients" class="list-group-item list-group-item-action list-group-item-danger">Clients</a>
          </div>
        </div>
      <?php endif ?>

      <div class="col">
        <?= $content ?>
      </div>
    </div>
  </div>


  <footer class="bg-secondary p-3">
    <p class="text-center">copyright @Sakila DevWeb DE</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>