<?php
require_once('templates/header.php');
require_once('library/recipe-config.php');

$recipes = getRecipes($pdo, _HOME_RECIPES_LIMIT);
?>



<div class="row flex-lg-row-reverse align-items-center g-5 py-5 m-2">
  <div class="col-10 col-sm-8 col-lg-6">
    <img src="./assets/images/Logo-MaSuperCuisine.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="450" height="450" loading="lazy">
  </div>
  <div class="col-lg-6">
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Allez découvrir toute nos recettes</h1>
    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
      <button type="button" class="btn btn-primary btn-lg px-4 me-md-2"><a href="./recettes.php" class="nav-link p-0 text-body-secondary">Nos recettes</a></button>
    </div>
  </div>
</div>


<div class="row flex-lg-row justify-content-around align-items-center g-3 py-3 m-1">

  <?php
  foreach ($recipes as $key => $recipe) {
    include('./templates/recipes_partial.php');
  } ?>

</div>

<?php
require_once('./templates/footer.php');
?>