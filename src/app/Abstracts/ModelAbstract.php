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

    public function create(array $fields)
    {
        $keys = array_keys($fields);
        $placeholders = rtrim(str_repeat('?, ', count($keys)), ', ');

        $query = sprintf(
            "INSERT INTO %s(%s) VALUES (%s)",
            $this->table,
            implode(', ', $keys),
            $placeholders
        );

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array_values($fields));

        return $this->pdo->lastInsertId();
    }

    public function update(array $fields): bool
    {
        $setValues = [];
        foreach ($fields as $key => $value) {
            $setValues[] = "$key = ?";
        }
        $setValues = implode(', ', $setValues);

        $query = sprintf(
            "UPDATE %s SET %s %s",
            $this->table,
            $setValues,
            $this->where
        );

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array_merge(array_values($fields), $this->whereParams));

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
