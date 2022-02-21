<?php

namespace App\Db;


use PDO;

class DbConnector
{
    private static ?DbConnector $instance = null;
    private PDO $db;

    private function __construct()
    {
        require_once 'config.php';
        /** @var  $db_config */
        $this->db = new PDO("mysql:host={$db_config['host']};dbname = {$db_config['db_name']}",
            $db_config['user'], $db_config['pass'],
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );
    }

    static function getInstance(): ?DbConnector
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;

    }

    public function getConnection(): PDO
    {
        return $this->db;
    }
}
