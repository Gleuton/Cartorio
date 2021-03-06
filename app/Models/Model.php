<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Models;


use Cartorio\DataBase\Builder;
use Cartorio\DataBase\Connection;


abstract class Model
{

    private $conn;
    protected $table = '';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function __construct()
    {
        $conn = Connection::connect();
        $conn->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );

        $this->conn = new Builder($conn);

        $this->conn->setTable($this->table);
        $this->conn->setPrimaryKey($this->primaryKey);
        $this->conn->setFilable($this->fillable);
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->conn->find($id);
    }

    public function findBy(string $filters)
    {
        return $this->conn->findBy($filters);
    }
    /**
     * @param string $filter
     *
     * @return array
     */
    public function all(string $filter = '')
    {
        return $this->conn->all($filter);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function insert(array $data)
    {
        return $this->conn->insert($data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return bool
     */
    public function update(string $id, array $data)
    {
        return $this->conn->update($id, $data);
    }

    public function delete(string $id)
    {
        $this->conn->delete($id);
    }

}