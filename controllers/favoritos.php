<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Model\Favorites;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$favorites = $queryBuilder-> getByColumn('Favorites','user_id',$_SESSION['userid'], 'App\Model\Favorites');


foreach($favorites as $favorite){
    $favorite->car = $queryBuilder->findById('Cars',$favorite->car_id, 'App\Model\Cars');
    $favorite->car->model = $queryBuilder->findById('Models',$favorite->car->model_id,'App\Model\Models');
    $favorite->car->fuelsType = $queryBuilder->findById('FuelTypes',$favorite->car->fuelsType_id,'App\Model\FuelTypes');
    $favorite->car->condition = $queryBuilder->findById('Conditions',$favorite->car->condition_id,'App\Model\Conditions');
    $favorite->car->boxType = $queryBuilder->findById('BoxTypes',$favorite->car->boxType_id,'App\Model\BoxTypes');
    $favorite->car->model->brand = $queryBuilder->findById('Brands',$favorite->car->model->brand_id,'App\Model\Brands');
    $favorite->car->state = $queryBuilder->findById('States',$favorite->car->state_id,'App\Model\States');
}

require 'views/favoritos.view.php';