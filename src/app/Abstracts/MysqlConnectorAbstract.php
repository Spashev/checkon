<?php

declare(strict_types=1);

namespace App\Abstracts;

use PDO;
use PDOException;

class MysqlConnectorAbstract
{
    public $pdo = null;
    private function getBasePath(): string
    {
        return __DIR__ . '/../';
    }
    
    public function connect()
    {
        $config = $this->getConfig();

        $dsn = $this->getDsn($config['mysql']);
        $opt = $this->getPDOSettings();
        try {
            if ($this->pdo === null) {
                $this->pdo = new PDO($dsn, $config['mysql']['user'], $config['mysql']['password'], $opt);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }
        
        return $this->pdo;
    }

    private function getPDOSettings(): array
    {
        return [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
    }

    private function getDsn($mysql): string
    {
        return sprintf("mysql:host=%s;dbname=%s;charset=UTF8",
            $mysql['host'],
            $mysql['database'],
        );
    }

    private function getConfig(): mixed
    {
        $configFile = $this->getBasePath() . 'config.php';

        if (file_exists($configFile)) {
            return require $configFile;
        }
        
        echo "Config file not found.";
        exit(0);
    }
}