<?php

namespace Core;

use Exception;

class Database
{
    private $connection = null;
    private $sql = '';
    private $table = null;
    private $statement = null;

    /**
     * Database constructor
     */
    public function __construct()
    {
        $this->connection = (new DatabaseConnector)->getConnection();
    }

    /**
     * Set the table to be used for the next query.
     *
     * @param   string      $table The name of the table to be used
     * @return  Database    The current Database instance
     */
    public function table($table = '')
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Prepare an INSERT SQL statement.
     *
     * @param   array       $fields The fields to be inserted
     * @return  Database    The current Database instance
     */
    public function insert($fields = [])
    {
        $placeholders = implode(', ', array_fill(0, count($fields), '?'));
        $sql = 'INSERT INTO ' . $this->table . ' (' . implode(', ', $fields) . ') VALUES (' . $placeholders . ')';
        $this->sql = $sql;
        $this->statement = 'insert';

        return $this;
    }

    /**
     * Prepare an UPDATE SQL statement.
     *
     * @param   array       $fields The fields to be updated
     * @return  Database    The current Database instance
     */
    public function update($fields = [])
    {
        $totalFields = count($fields);
        $i = 1;
        $sql = 'UPDATE ' . $this->table . ' SET';

        foreach ($fields as $field) {
            $sql .= ' ' . $field . ' = ?' . (($i == $totalFields) ? '' : ',');
            $i++;
        }

        $this->sql = $sql;
        $this->statement = 'update';

        return $this;
    }

    /**
     * Add a WHERE clause to the SQL statement.
     *
     * @param   array       $fields The fields to be used in the WHERE clause
     * @return  Database    The current Database instance
     */
    public function where($fields = [])
    {
        $sql = ' WHERE';

        foreach ($fields as $value) {
            $sql .= ' ' . $value . ' = ?';
        }

        $this->sql .= $sql;

        return $this;
    }

    /**
     * Prepare a SELECT SQL statement.
     *
     * @param   array       $fields The fields to be selected
     * @return  Database    The current Database instance
     */
    public function select($fields = [])
    {
        $sql = 'SELECT ' . implode(', ', $fields) . ' FROM ' . $this->table;
        $this->sql = $sql;
        $this->statement = 'select';

        return $this;
    }

    /**
     * Prepare a DELETE SQL statement.
     *
     * @return  Database  The current Database instance
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . $this->table;
        $this->sql = $sql;
        $this->statement = 'delete';

        return $this;
    }

    /**
     * Execute the prepared SQL statement.
     *
     * @param   array   $data The data to be used in the SQL statement
     * @return  mixed   The result of the execution, either an array of results or a boolean indicating success or failure
     */
    public function execute($data = [])
    {
        try {
            $stmt = $this->connection->prepare($this->sql);

            if (!$stmt) {
                return false;
            }

            if (!empty($data)) {
                $types = '';
                $params = [];

                foreach ($data as $value) {
                    if (is_int($value)) {
                        $types .= 'i'; // integer
                    } elseif (is_double($value)) {
                        $types .= 'd'; // double
                    } elseif (is_string($value)) {
                        $types .= 's'; // string
                    } else {
                        $types .= 's'; // default to string
                    }

                    $params[] = $value;
                }

                if (!$stmt->bind_param($types, ...$params)) {
                    return false;
                }
            }

            if ($stmt->execute()) {
                if ($this->statement === 'select') {
                    $result = $stmt->get_result();
                    $data = $result->fetch_all(MYSQLI_ASSOC);
                    $result->close();

                    return $data;
                }

                return true;
            } else {
                return false;
            }
        } catch (Exception $error) {
            throw new Exception($error->getMessage() . '. SQL Query: ' . $this->sql . '.');
        }
    }

    /**
     * Begin a transaction
     * 
     * @return void
     */
    public function beginTransaction()
    {
        $this->connection->begin_transaction();
    }

    /**
     * Commit a transaction
     * 
     * @return void
     */
    public function commitTransaction()
    {
        $this->connection->commit();
    }

    /**
     * Rollback a transaction
     * 
     * @return void
     */
    public function rollbackTransaction()
    {
        $this->connection->rollback();
    }
}
