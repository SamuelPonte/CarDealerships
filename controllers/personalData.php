<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$user = $queryBuilder->findById('Users', $id, 'App\Model\Users');

require 'views/personalData.view.php';