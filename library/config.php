<?php

define('_RECIPES_IMG_PATH', 'uploads/recipes/');
define('_ASSET_IMG_PATH', 'assets/images');
define('_HOME_RECIPES_LIMIT', 6);

$mainMenu = [
  'MaSuperCuisine.php' => 'Accueil',
  'recettes.php' => 'Nos recettes',
  'ajout_modif_recettes.php' => 'Ajout/modif recettes',
];

$pdo = new PDO('mysql:dbname=ma_super_cuisine;host=localhost;charset=utf8mb4', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
