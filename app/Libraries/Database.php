<?php

/**
 * Undocumented class
 */
class Database
{
    private $host= DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname   = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $this->connect();
    }

    /**
     * Connect with database
     *
     * @return void
     */
    private function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch(Exception $ex)
        {
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }

    /**
     * prepare sql query
     *
     * @param $sql
     * @return void
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * bind value
     *
     * @param [type] $param
     * @param [type] $value
     * @param [type] $type
     * @return void
     */
    public function bind($param, $value, $type=null)
    {
        if(is_null($type)):
            switch(true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;

                default:
                    $type = PDO::PARAM_STR;
                break;
            }
        endif;

        $this->stmt->bindValue($param);
    }

    /**
     * Execute sql query
     *
     * @return void
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * get set of data as an obj
     *
     * @return void
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_BOTH);
    }

    /**
     * get single data as an obj
     *
     * @return void
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_BOTH);
    }

    /**
     * get number of row
     *
     * @return void
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}