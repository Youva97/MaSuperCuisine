<?php

function getCategories(PDO $pdo)
{
  $sql = 'SELECT * FROM categories';

  $squery = $pdo->prepare($sql);

  $squery->execute();
  return $squery->fetchAll();
}
