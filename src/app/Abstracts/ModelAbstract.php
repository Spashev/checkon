<?php

declare(strict_types=1);

namespace App\Abstracts;

abstract class ModelAbstract extends MysqlConnectorAbstract
{
    protected string $table = '';
    private string $where = '';
    private array $whereParams = [];

    public function __construct()
    {
        $this->connect();
    }
    
    public function where(array $conditions): self
    {
        $this->where = 'WHERE ';
        foreach ($conditions as $key => $value) {
            $this->where .= "`$key` = ? AND ";
            $this->whereParams[] = $value;
        }
        $this->where = rtrim($this->where, ' AND ');

        return $this;
    }

    public function all(): array
    {
        $query = sprintf(
            "SELECT * FROM %s %s",
            $this->table,
            $this->where
        );

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($this->whereParams);

        return $stmt->fetchAll();
    }

    public function create(array $fields): bool
    {
        $keys = array_keys($fields);
        $placeholders = rtrim(str_repeat('?, ', count($keys)), ', ');

        $query = sprintf(
            "INSERT INTO %s(%s) VALUES (%s)",
            $this->table,
            implode(', ', $keys),
            $placeholders
        );

        print_r($query);
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array_values($fields));

        return true;
    }
    
    public function delete(): bool
    {
        $query = sprintf(
            "DELETE FROM %s %s",
            $this->table,
            $this->where
        );

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($this->whereParams);

        return true;
    }
}
