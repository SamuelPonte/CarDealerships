<?php
namespace App\Model;

class Favorites
{
    /* table columns */
    public $id;
    public $car_id;
    public $user_id;
    /* foreign */
    public $car;
    public $user;
}