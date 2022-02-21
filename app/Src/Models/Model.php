<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/20/22
 * Time: 3:48 AM
 */


namespace App\Models;


use App\Db\DbConnector;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $db_instance = DbConnector::getInstance();
        $this->db = $db_instance->getConnection();
    }

}
