<?php
require_once('templates/header.php');
require_once('library/recipe-config.php');

$recipes = getRecipes($pdo);
?>



<div class="row flex-lg-row-reverse align-items-center g-5 py-5 m-2">
  <h1>Découvrez nos recettes</h1>
</div>


<div class="row flex-lg-row justify-content-around align-items-center g-3 py-3 m-1">

  <?php
  foreach ($recipes as $key => $recipe) {
    include('./templates/recipes_partial.php');
  } ?>

</div>

<?php
require_once('./templates/footer.php')
?>