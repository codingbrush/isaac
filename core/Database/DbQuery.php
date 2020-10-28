<?php

namespace Isaac\Core\Database;

class DbQuery extends Database{

    public $db, $dbh, $pdo;

    public function __construct()
    {
        $this->dbh = new Database();
        $this->db = $this->dbh->connect();
    }

    // Prepare statement with query
    /**
     * query
     *
     * @param  mixed $query
     *
     * @return void
     */
    public function sql(string $query) {
        $this->stmt = $this->db->prepare($query);
    }

    // Bind values

    /**
     * bind
     *
     * @param mixed $param
     * @param mixed $value
     * @param mixed $type
     *
     * @return bool
     */
    public function bind(string $param,string $value, $type = null)
    {
        if (is_null ($type)) {
            switch (true) {
                case is_int($value) :
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = \PDO::PARAM_NULL;
                    break;
                default :
                    $type = \PDO::PARAM_STR;
            }
        }
        return $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * bindMultiple
     *
     * @param array $data
     *
     * @return void
     */
    public function bindMultiple(array $data)
    {
        $prepVal = [];
        /*
        *The foreach loop splits the array given into key and value for each index.
        * The keys are separated into a $keys array, the same is done to the values.
        * A $prepKey array is used for the key binding needed by pdo for the data manipulation.
        * A $prepVal array is used to store the $prepKey and values giving a :name => name Array.
        */
        foreach ($data as $key => $value) {
            $keys[]            = $key;
            $prepKey           = ":" . $key; //$prepKey is a variable that stores strings
            $prepVal[$prepKey] = $value;
        }

        //Using foreach loop bind the values to their placeholders, represented by the key value pairs in the array.
        foreach ($prepVal as $key => $value) {
            $this->stmt->bindValue($key, $value);
        }
    }

    // Execute the prepared statement

    /**
     * execute
     *
     * @return bool
     */
    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (\Throwable $th) {
            $th->getMessage();
        }

    }

    // Get result set as array of objects

    /**
     * resultset
     *
     * @return array
     */
    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    // Get single record as object

    /**
     * single
     *
     * @return object
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    // Get record row count

    /**
     * rowCount
     *
     * @return int
     */
    public function rowCount() : int
    {
        return $this->stmt->rowCount();
    }

    // Returns the last inserted ID
    public function lastInsertId(){
        return $this->stmt->lastInsertId();
    }

}
