<?php

namespace Isaac\Core\Database;

class Database{

    private $_connection;
    private $DB_host = "localhost";
    private $DB_user_name = "root";
    private $DB_user_password = "";
    private $DB_driver = "mysql";
    private $DB_database = "isaac";


    public function __construct()
    {
        try {
            if (is_null($this->_connection) || empty($this->_connection)) {
                $this->_connection = new \PDO($this->DB_driver.':host='.$this->DB_host.';dbname='.$this->DB_database, $this->DB_user_name, $this->DB_user_password);
            }
        } catch (\Exception $e) {
            $this->_connection = $e;
        }
    }

    public function connect()
    {
        return $this->_connection ? $this->_connection : null;
    }
}