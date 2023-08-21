<?php

$tableNavLinks = [
  'home' => 'Accueil',
  'features' => 'Produits',
  'pricing' => 'Prix',
  'faqs' => 'FAQs',
  'About' => 'A propos'
];
$tableSections = [
  'section1' => 'Menu',
  'section2' => 'Actualité',
  'section3' => 'Promotion',
];

function getRecipesById(PDO $pdo, int $id)
{
  $query = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->execute();
  return $query->fetch();
}

function getRecipesImage(string|null $image)
{
  if ($image === null) {
    return _ASSET_IMG_PATH . '/recipe_default.jpg';
  } else {
    return _RECIPES_IMG_PATH . $image;
  }
}

function getRecipes(PDO $pdo, int $limit = null)
{
  $sql = 'SELECT * FROM recipes ORDER BY id DESC';

  if ($limit) {
    $sql .= ' LIMIT :limit';
  }

  $squery = $pdo->prepare($sql);

  if ($limit) {
    $squery->bindParam(':limit', $limit, PDO::PARAM_INT);
  }
  $squery->execute();
  return $squery->fetchAll();
}

function saveRecipe(PDO $pdo, string $title, string $description, string $ingredients, string $instructions, int $category, string | null $image)
{
  $sql = "INSERT INTO `recipes` (`id`, `title`, `description`, `ingredients`, `instructions`, `category_id`, `image`) VALUES (NULL, :title, :description, :ingredients, :instructions, :category_id, :image)";
  $squery = $pdo->prepare($sql);
  $squery->bindParam(':title', $title, PDO::PARAM_STR);
  $squery->bindParam(':description', $description, PDO::PARAM_STR);
  $squery->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
  $squery->bindParam(':instructions', $instructions, PDO::PARAM_STR);
  $squery->bindParam(':category_id', $category, PDO::PARAM_INT);
  $squery->bindParam(':image', $image, PDO::PARAM_STR);
  return $squery->execute();
}
