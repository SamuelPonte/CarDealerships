<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

//Carro
$cars = $queryBuilder->getAll('Cars', 'App\Model\Cars');
/* $car = $queryBuilder->findById('Cars',$id,'App\Model\Cars'); */



// fill relationship
foreach ($cars as $car) {
    $car->model = $queryBuilder->findById('Models',$car->model_id,'App\Model\Models');
    $car->fuelsType = $queryBuilder->findById('FuelTypes',$car->fuelsType_id,'App\Model\FuelTypes');
    $car->condition = $queryBuilder->findById('Conditions',$car->condition_id,'App\Model\Conditions');
    $car->boxType = $queryBuilder->findById('BoxTypes',$car->boxType_id,'App\Model\BoxTypes');
    $car->model->brand = $queryBuilder->findById('Brands',$car->model->brand_id,'App\Model\Brands');
    $car->state = $queryBuilder->findById('States',$car->state_id,'App\Model\States');
    $car->user = $queryBuilder->findById('Users',$car->user_id,'App\Model\Users');
}



require 'views/myAdverts.show.view.php';