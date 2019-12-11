<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Models;


use Cartorio\DataBase\Builder;
use Cartorio\DataBase\ConnectionInterface;

abstract class Model
{

    private $conn;
    protected $table = '';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function __construct(ConnectionInterface $conn)
    {
        $this->conn = new Builder($conn->connect());
        $this->conn->setTable($this->table);
        $this->conn->setPrimaryKey($this->primaryKey);
        $this->conn->setFilable($this->fillable);
    }

    public function find(string $id)
    {
        return $this->conn->find($id);
    }

    public function all(string $filter = '')
    {
        return $this->conn->all($filter);
    }

    public function insert(array $data)
    {
        $this->conn->insert($data);
    }

    public function update(string $id, array $data)
    {
        $this->conn->update($id, $data);
    }

    public function delete(string $id)
    {
        $this->conn->delete($id);
    }


}