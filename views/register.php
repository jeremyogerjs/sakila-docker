<?php ob_start() ?>

<h2 class="title">S'enregistrer</h2>
    <form class="w-25 m-auto p-4" method="POST" action="index.php?target=register">
    <div class="mb-3">
        <label for="firstName" class="form-label">first Name</label>
        <input type="text" name="firstName" class="form-control" id="firstName" aria-describedby="firstNameHelp">
        <div id="firstNameHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">last Name</label>
        <input type="text" name="lastName" class="form-control" id="lastName" aria-describedby="lastNameHelp">
        <div id="lastNameHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <select class="form-select" name="addrese" aria-label="Default select example">
            <option selected>selectionner votre adresse</option>
            <?php foreach($address as $item) : ?>
                <option value="<?= $item -> address_id ?>"><?= $item -> address ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" name="store" aria-label="Default select example">
            <option selected>selectionner votre magasin</option>
            <?php foreach($stores as $item) : ?>
                <option value="<?= $item -> store_id ?>"><?= $item -> store_id ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">user Name</label>
        <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
        <div id="usernameHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">S'enregistrer</button>
    </form>


<?php 

$content = ob_get_clean() ?>

<?php require('layout.php') ?>