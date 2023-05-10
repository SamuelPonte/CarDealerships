<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$id = $_POST['car_id'];

$queryBuilder->delete($id);

redirect('UserAdverts');