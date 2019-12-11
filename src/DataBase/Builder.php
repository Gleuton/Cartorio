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
        $sql = "SELECT * FROM {$this->table} WHERE {$id}";
        $result = $this->connection->query($sql);
        return $result->fetchObject(__CLASS__);
    }

    /**
     * @param string $filter
     *
     * @return array
     */
    public function all(string $filter = '')
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($filter) {
            $sql .= ' ' . $filter;
        }

        $result = $this->connection->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @param array $data
     */
    public function insert(array $data)
    {
        $data = $this->fillableData($data);

        $columns = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        $this->connection->prepare($sql)->execute($data);
    }

    /**
     * @param string $id
     * @param array  $data
     */
    public function update(string $id, array $data)
    {
        $data = $this->fillableData($data);
        $columns = '';
        $data[$this->primaryKey] = $id;

        foreach (array_keys($data) as $key) {
            $columns .= "{$key}=:{$key}, ";
        }
        $columns = substr($columns, 0, -1);

        $sql = "UPDATE {$this->table} SET {$columns} ";
        $sql .= "WHERE {$this->primaryKey}=:{$this->primaryKey}";

        $this->connection->prepare($sql)->execute($data);
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
            if (array_key_exists($key, $this->fillable)) {
                $fillableData[$key] = $value;
            }
        }

        return $fillableData;
    }
}