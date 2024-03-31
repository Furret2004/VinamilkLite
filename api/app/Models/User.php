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
     * The fields to insert data.
     *
     * @var array
     */
    protected $insertFields = ['id', 'first_name', 'last_name', 'email', 'password'];

    /**
     * The select fields.
     * 
     * @var array
     * 
     */
    protected $selectFields = ['id', 'first_name', 'last_name', 'email', 'password'];

    /**
     * The fields to update data.
     *
     * @var array
     */
    protected $updateFields = ['first_name', 'last_name', 'email', 'password'];
}
