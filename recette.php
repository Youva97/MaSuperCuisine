<?php
require_once('templates/header.php');

require_once('library/recipe-config.php');

require_once('library/tools.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$id = (int)$_GET['id'];

$recipe = getRecipesById($pdo, $id);

if ($recipe) {

  $ingredients = lineToArray($recipe['ingredients']);
  $instructions = lineToArray($recipe['instructions']);
?>


  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 m-2">
      <h1>Voici notre recettes</h1>
    </div>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= getRecipesImage($recipe['image']); ?>" class="d-block mx-lg-auto img-fluid" alt="" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $recipe['title']; ?></h1>
        <p class="lead"><?= $recipe['description']; ?></p>
      </div>
    </div>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <h2>Ingrédients</h2>
      <ul class="list-group col-6 col-auto me-auto mb-2 mb-lg-0">
        <?php foreach ($ingredients as $key => $ingredient) { ?>
          <li class="list-group-item"><?= $ingredient; ?></li>
        <?php
        }
        ?>
      </ul>
    </div>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <h2>Instruction</h2>
      <ol class="list-group col-6 col-auto me-auto mb-2 mb-lg-0 list-group-numbered">
        <?php foreach ($instructions as $key => $instruction) { ?>
          <li class="list-group-item"><?= $instruction; ?></li>
        <?php
        }
        ?>
      </ol>
    </div>
  </div>
<?php } else { ?>
  <div class="row text-center">
    <h1>Recettes introuvable</h1>
  </div>
<?php
};
?>
<?php
require_once('./templates/footer.php');
?>