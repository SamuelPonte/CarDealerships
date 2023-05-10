<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$fav = $queryBuilder->create('Favorites', [
    'car_id' => $_POST['car_id'],
    'user_id' => $_POST['user_id']
]);

header('Content-type: application/json; charset=utf-8');
echo json_encode($fav);
