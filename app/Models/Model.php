<?php
/**
 * Author: gleuton.pereira
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
        $conn = (new Connection(__DIR__ . '/../../env.json'));
        $conn->connect()->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );

        $this->conn = new Builder($conn->connect());

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
    public function insert(array $data): bool
    {
        return $this->conn->insert($data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return bool
     */
    public function update(string $id, array $data): bool
    {
        return $this->conn->update($id, $data);
    }

    public function delete(string $id)
    {
        $this->conn->delete($id);
    }


}