<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$brands = $queryBuilder->getAll('Brands', 'App\Model\Brands');
$models = $queryBuilder->getAll('Models', 'App\Model\Models');
$fuelTypes = $queryBuilder->getAll('FuelTypes', 'App\Model\FuelTypes');
$conditions = $queryBuilder->getAll('Conditions', 'App\Model\Conditions');
$boxTypes = $queryBuilder->getAll('BoxTypes', 'App\Model\BoxTypes');



/* foreach ($models as $model) {
    $model->brand = $queryBuilder->findById('Brands', $model->brand_id, 'App\Model\Brands');
}
*/

require 'views/anunciar.view.php';
