<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$cars = $queryBuilder->getAll('Cars','App\Model\Cars');
$brands = $queryBuilder->getAll('Brands','App\Model\Brands');
$models = $queryBuilder->getAll('Models','App\Model\Models');
$FuelTypes = $queryBuilder->getAll('FuelTypes','App\Model\FuelTypes');
$Conditions = $queryBuilder->getAll('Conditions','App\Model\Conditions');
$BoxTypes = $queryBuilder->getAll('BoxTypes','App\Model\BoxTypes');

$favorites = $queryBuilder->getAll('Favorites','App\Model\Favorites');

// fill relationship
foreach ($cars as $car) {
    $car->model = $queryBuilder->findById('Models',$car->model_id,'App\Model\Models');
    $car->fuelsType = $queryBuilder->findById('FuelTypes',$car->fuelsType_id,'App\Model\FuelTypes');
    $car->condition = $queryBuilder->findById('Conditions',$car->condition_id,'App\Model\Conditions');
    $car->boxType = $queryBuilder->findById('BoxTypes',$car->boxType_id,'App\Model\BoxTypes');
    $car->model->brand = $queryBuilder->findById('Brands',$car->model->brand_id,'App\Model\Brands');
    $car->state = $queryBuilder->findById('States',$car->state_id,'App\Model\States');
}


/* $models = $queryBuilder->getAll('Models','App\Model\Models');
// fill relationship
foreach ($models as $model) {
    $model->brand = $queryBuilder->findById('Brands',$model->brand_id,'App\Model\Brands');
} */

require 'views/home.view.php';