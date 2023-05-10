<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$id = $queryBuilder->create('Cars',[
    'price' => $_POST['price'],
    'year' => $_POST['year'],
    'km' => $_POST['km'],
    'door' => $_POST['door'],
    'place' => $_POST['place'],
    'power_car' => $_POST['power'],
    'engine_capacity' => $_POST['engine'],
    'color' => $_POST['color'],
    'description' => $_POST['description'],
    'address' => $_POST['address'],
    'model_id' => $_POST['model_id'],
    'fuelsType_id' => $_POST['fuel'],
    'condition_id' => $_POST['condition'],
    'boxType_id' => $_POST['box'],
    'user_id' => $_POST['user_id'],
    'state_id' => 1,
]);


$queryBuilder->create('Images',[
    'name' => basename($_FILES['img1']['name']),
    'car_id' => $id
]);

$queryBuilder->create('Images',[
    'name' => basename($_FILES['img2']['name']),
    'car_id' => $id
]);

$queryBuilder->create('Images',[
    'name' => basename($_FILES['img3']['name']),
    'car_id' => $id
]);

$queryBuilder->create('Images',[
    'name' => basename($_FILES['img4']['name']),
    'car_id' => $id
]);

$queryBuilder->moveUploadedFileAssingID($_FILES['img'], $id);
$queryBuilder->moveUploadedFile($_FILES['img1'],"Imagens/",$id);
$queryBuilder->moveUploadedFile($_FILES['img2'],"Imagens/",$id);
$queryBuilder->moveUploadedFile($_FILES['img3'],"Imagens/",$id);
$queryBuilder->moveUploadedFile($_FILES['img4'],"Imagens/",$id);


redirect('');
