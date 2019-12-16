<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\DataBase;

use PDO;

class Builder
{
    /**
     * @var PDO
     */
    private $connection;
    private $table;
    private $primaryKey = 'id';
    private $fillable = [];

    /**
     * Builder constructor.
     *
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $table
     *
     * @return Builder
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param string $primaryKey
     *
     * @return Builder
     */
    public function setPrimaryKey(string $primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    /**
     * @param array $fillable
     */
    public function setFilable(array $fillable)
    {
        $this->fillable = $fillable;
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function find(string $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = {$id}";

        $result = $this->connection->query($sql);
        return $result->fetchObject();
    }

    public function findBy(string $filters)
    {
        $sql = "SELECT * FROM {$this->table}";

        $sql .= ' ' . $filters;
        $result = $this->connection->query($sql);
        return $result->fetchObject();
    }

    /**
     * @param string $filter
     *
     * @return array
     */
    public function all(string $filter = '')
    {
        $sql = "SELECT * FROM {$this->table}";

        if (!empty($filter)) {
            $sql .= ' ' . $filter;
        }

        $result = $this->connection->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function insert(array $data):bool
    {
        $data = $this->fillableData($data);

        $columns = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (:{$values})";
        return $this->connection->prepare($sql)->execute($data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return bool
     */
    public function update(string $id, array $data)
    {
        $data = $this->fillableData($data);
        $columns = '';

        foreach (array_keys($data) as $key) {
            $columns .= "{$key}=:{$key},";
        }

        $data[$this->primaryKey] = $id;
        $columns = substr($columns, 0, -1);

        $sql = "UPDATE {$this->table} SET {$columns} ";
        $sql .= " WHERE {$this->primaryKey}=:{$this->primaryKey}";

        return $this->connection->prepare($sql)->execute($data);
    }

    /**
     * @param string $id
     */
    public function delete(string $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $this->connection->prepare($sql)->execute([$id]);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    private function fillableData(array $data): array
    {
        $fillableData = [];

        foreach ($data as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $fillableData[$key] = $value;
            }
        }

        return $fillableData;
    }
}