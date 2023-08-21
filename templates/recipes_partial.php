<div class="col-md-4 ">
  <div class="card" style="width: 18rem;">
    <img src="<?= getRecipesImage($recipe['image']); ?>" class="card-img-top" alt="<?= $recipe['title']; ?>">
    <div class="card-body">
      <h3 class="card-title"><?= $recipe['title']; ?></h3>
      <p class="card-text"><?= $recipe['description']; ?></p>
      <a href="recette.php?id=<?= $recipe['id']; ?>" class="btn btn-primary">Voir la recette</a>
    </div>
  </div>
</div>