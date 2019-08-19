<?php

namespace App\Utils;

use PDO;
use PDOException;

class DBException extends \Exception {};

class DB{
    private $dbh;
    private $error;
    private $qError;
    private $stmt;

    public function __construct(){
        //dsn for mysql
        $dsn = "mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB;
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn, MYSQL_USER, MYSQL_PWD, $options);
            $this->dbh->exec("SET NAMES 'utf8'");
        }
        catch (PDOException $e){
            $this->error = $e->getMessage();
        }

    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        $res = $this->stmt->execute();

        $this->qError = $this->dbh->errorInfo();
        if(!is_null($this->qError[2])){
            throw new DBException($this->qError[2]);
        }

        return $res;
    }

    public function result($class){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $class);
    }

    public function single($class){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $class);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

    public function beginTransaction(){
        return $this->dbh->beginTransaction();
    }

    public function endTransaction(){
        return $this->dbh->commit();
    }

    public function cancelTransaction(){
        return $this->dbh->rollBack();
    }

    public function debugDumpParams(){
        return $this->stmt->debugDumpParams();
    }

    public function queryError(){
        $this->qError = $this->dbh->errorInfo();
        if(!is_null($this->qError[2])){
            return $this->qError[2];
        }
    }

}
