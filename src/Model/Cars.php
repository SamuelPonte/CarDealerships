<?php
namespace App\Model;

class Cars
{
    /* table columns */
    public $id;
    public $price;
    public $year;
    public $km;
    public $door;
    public $place;
    public $power_car;
    public $engine_capacity;
    public $color;
    public $description;
    public $address;
    public $model_id;
    public $fuelsType_id;
    public $condition_id;
    public $boxType_id;
    public $user_id;
    public $state_id;
    /* foreign */
    public $model;
    public $fuelsType;
    public $condition;
    public $boxType;
    public $user;
    public $state;
}