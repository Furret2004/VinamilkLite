<?php

namespace App\Models;

use Core\Model;

class Auth extends Model
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

    /**
     * Get a user by email from the table.
     *
     * @param   string  $email The email of the user to select
     * @return  mixed   Array of results if successful, false otherwise
     */
    public function getByEmail($email)
    {
        return $this->db->table($this->tableName)
            ->select($this->selectedFields)
            ->where(['email' => $email])->execute()[0];
    }
}
