<h2 class="title">Se connecter</h2>
<?php if(isset($error)) : ?>
  <div class="alert alert-danger" role="alert">
    <?= $error ?>
  </div>
<?php endif ?>
<form class="w-25 m-auto p-4" method="POST" action="login">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>