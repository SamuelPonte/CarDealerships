<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$favId = $_POST['id'];
$favdelete = $queryBuilder->deleteById('Favorites',$favId);

header('Content-type: application/json; charset=utf-8');
echo json_encode(array('success' => true));