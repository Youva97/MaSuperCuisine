<?php
require_once('templates/header.php');

if (!isset($_SESSION['user'])) {
  header('location: login.php');
}

require_once('library/recipe-config.php');
require_once('library/tools.php');
require('library/category.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$errors = [];
$messages = [];
$recipe = [

  $title = isset($_POST['title']) ? $_POST['title'] : '',

  $description = isset($_POST['description']) ? $_POST['description'] : '',

  $ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : '',

  $instructions = isset($_POST['instructions']) ? $_POST['instructions'] : '',

  $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : (isset($recipe['category_id']) ? $recipe['category_id'] : ''),

];

$categories = getCategories($pdo);

if (isset($_POST['saveRecipe'])) {
  $fileName = null;
  // Quand un fichier a été envoyé 
  if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
    $checkImages = getimagesize($_FILES['file']['tmp_name']);
    var_dump($checkImages);
    // si c'est une image on traite
    if ($checkImages !== false) {
      $fileName = uniqid() . '-' . slugify($_FILES['file']['name']);
      // si ce n'est pas une image on ne traite pas

      move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH . $fileName);
    } else {
      $errors[] = 'Le fichier doit être une image';
    }
  }

  if ($errors) {

    $res = saveRecipe($pdo, $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], (int) $_POST['category_id'], $fileName);

    if ($res) {
      $messages[] = 'La recette a bien été sauvegarder.';
    } else {
      $errors[] = 'La recette n\'a pas été sauvegarder.';
    }
  }
}

?>


<h1>Ajouter une nouvelle recette</h1>

<?php foreach ($messages as $message) { ?>
  <div class="alert alert-success">
    <?= $message; ?>
  </div>
<?php } ?>

<?php foreach ($errors as $error) { ?>
  <div class="alert alert-danger">
    <?= $error; ?>
  </div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">


  <div class="mb-3">
    <label for="title" class="form-label">Titre</label>
    <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text-area" name="description" id="description" rows="5" cols="20" class="form-control" value="<?php echo $description; ?>">
  </div>


  <div class="mb-3">
    <label for="ingredients" class="form-label">Ingrédients</label>
    <input type="text-area" name="ingredients" id="ingredients" rows="5" cols="20" class="form-control" value="<?php echo $ingredients; ?>">
  </div>
  <div class="mb-3">
    <label for="instructions" class="form-label">Instructions</label>
    <input type="text-area" name="instructions" id="instructions" rows="5" cols="20" class="form-control" value="<?php echo $instructions; ?>">
  </div>


  <div class="mb-3">
    <label for="category_id" class="form-label">Catégorie</label>
    <select name="category_id" id="category_id" class="form-select">
      <?php foreach ($categories as $category) { ?>

        <option value="<?= $category['id'] ?>" <?= $category_id == $category['id'] ? 'selected="selected"' : '' ?>><?= $category['name']; ?></option>

      <?php } ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="file"></label>
    <input type="file" id="file" name="file">
  </div>
  <input type="submit" value="Enregrister" name="saveRecipe" class="btn btn-primary">

</form>

<?php
require_once('./templates/footer.php');
?>