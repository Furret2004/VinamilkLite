<?php

namespace Core;

use Core\Database;

class Model
{
    /**
     * Database.
     *
     * @var object
     */
    public $db;

    /**
     * Table name.
     *
     * @var string
     */
    protected $tableName = '';

    /**
     * The fields to insert data.
     *
     * @var array
     */
    protected $insertFields = [];

    /**
     * The select fields.
     * 
     * @var array
     * 
     */
    protected $selectFields = [];

    /**
     * The fields to update data.
     *
     * @var array
     */
    protected $updateFields = [];

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get all records from the table.
     *
     * @return  mixed    Array of results if successful, false otherwise
     */
    public function getAll()
    {
        return $this->db->table($this->tableName)
            ->select($this->selectFields)->execute();
    }

    /**
     * Get a record by its ID from the table.
     *
     * @param   int     $id The ID of the record to select
     * @return  mixed   Array of results if successful, false otherwise
     */
    public function getById($id)
    {
        return $this->db->table($this->tableName)
            ->select($this->selectFields)->where(['id'])->execute(['id' => $id]);
    }

    /**
     * Create a new record in the table.
     *
     * @param   array   $data The data to insert
     * @return  bool    True if successful, false otherwise
     */
    public function create(array $data)
    {
        $insertData = [];

        foreach ($this->insertFields as $field) {
            if (array_key_exists($field, $data)) {
                $insertData[] = $data[$field];
            } else {
                $insertData[] = null;
            }
        }

        return $this->db->table($this->tableName)
            ->insert($this->insertFields)->execute($insertData);
    }

    /**
     * Update a record with some attributes in the table.
     *
     * @param   array   $data The data to update
     * @param   string  $id The ID of the record to update
     * @return  bool    True if successful, false otherwise
     */
    public function update(array $data, string $id)
    {
        return $this->db->table($this->tableName)
            ->update(array_keys($data))->where(['id'])
            ->execute($data + ['id' => $id]);
    }

    /**
     * Update a record with all attributes in the table.
     *
     * @param   array   $data The data to update
     * @param   string  $id The ID of the record to update
     * @return  bool    True if successful, false otherwise
     */
    public function updateAll(array $data, string $id)
    {
        $updateData = [];
        foreach ($this->updateFields as $field) {
            if (array_key_exists($field, $data)) {
                $updateData[] = $data[$field];
            } else {
                $updateData[] = null;
            }
        }

        return $this->db->table($this->tableName)
            ->update($this->updateFields)->where(['id'])
            ->execute($updateData + ['id' => $id]);
    }

    /**
     * Delete a record in the table where the ID matches, 
     *
     * @param   string  $id The ID of the record to delete
     * @return  bool    True if successful, false otherwise
     */
    public function delete($id)
    {
        return $this->db->table($this->tableName)->delete()->where(['id'])->execute(['id' => $id]);
    }

    /**
     * Get insert fields
     * 
     * @return  array
     */
    public function getInsertFields()
    {
        return $this->insertFields;
    }

    /**
     * Get select fields
     * 
     * @return  array
     */
    public function getSelectFields()
    {
        return $this->selectFields;
    }

    /**
     * Get update fields
     * 
     * @return  array
     */
    public function getUpdateFields()
    {
        return $this->updateFields;
    }
}
