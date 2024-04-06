<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $tableName = 'users';

    /**
     * The selected fields.
     * 
     * @var array
     * 
     */
    protected $selectedFields = ['id', 'email', 'password', 'first_name', 'last_name', 'role'];
}
