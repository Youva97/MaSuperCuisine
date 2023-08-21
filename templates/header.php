<?php
include_once('./library/config.php');
require_once('./library/session.php');
// require_once('./logout.php');

$currentPage = basename($_SERVER["SCRIPT_NAME"]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Découvrez mon site de cuisine où je vous partage mes recettes.">
  <meta name="title" content="MaSuperCuisine">
  <title>Ma Super Cuisine</title>


  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="./assets/css/override-bootstrap.css" rel="stylesheet">
  <link href="./assets/css/style.css">

</head>

<body>


  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="./assets/images/logo-MaSuperCuisine-horizontal.png" alt="MaSuperCuisine" width="150" height="150">
        </a>
      </div>

      <ul class="nav col-12 col-lg-auto mb-2 justify-content-center mb-lg-0 nav nav-pills">
        <?php foreach ($mainMenu as $key => $mainValue) { ?>
          <li class="nav-item"><a href="<?= $key; ?>" class="nav-link
           <?php if ($currentPage === $key) {
              echo 'active';
            } ?>"><?= $mainValue; ?></a></li>
        <?php } ?>
      </ul>

      <div class="col-md-3 text-end">
        <?php
        if (!isset($_SESSION['user'])) { ?>
          <a href="/login.php" type="button" class="btn btn-outline-primary me-2">Se connecter</a>
          <a href="/inscription.php" type="button" class="btn btn-outline-primary me-2">S'inscrire</a>

        <?php } else { ?>
          <a href="/logout.php" type="button" class="btn btn-primary">Se déconnecter</a>

        <?php  }
        ?>
      </div>
    </header>