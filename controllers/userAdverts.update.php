<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$queryBuilder->update('Cars', $id, [
    'state_id' => 2
]);

redirect('UserAdverts');
