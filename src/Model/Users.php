<?php
namespace App\Model;

class Users
{
    /* table columns */
    public $id;
    public $name;
    public $email;
    public $username;
    public $birthdate;
    public $pass;
    public $phone;
    public $role_id;
    /* foreign */
    public $role;
}