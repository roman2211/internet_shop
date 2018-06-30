<?php


namespace simpleengine\core;

use \simpleengine\core\Application;

class Db
{
    private $pdo;

    public function __construct(string $connection_name = "DB"){
        $app = Application::instance();

        try{
            $pass = $app->get($connection_name)["DB_PASS"];
            $user = $app->get($connection_name)["DB_USER"];
            $name = $app->get($connection_name)["DB_NAME"];
            $host = $app->get($connection_name)["DB_HOST"];
            $charset = $app->get($connection_name)["DB_CHARSET"];
            $dsn = 'mysql:dbname='.$name.';host='.$host.";charset=".$charset;


            $this->pdo = new \PDO($dsn, $user, $pass);
        }
        catch(\PDOException $e){
            echo $e->getMessage();
            echo "Can't connect to database";
        }
    }

    public function getArrayBySqlQuery(string $sql){
        $statement = $this->pdo->query($sql);
        $result = $statement->fetchAll();

        return $result;
    }
    
    public function actionWithDataBySqlQuery($sql){
        $this->pdo->query($sql);
    }

    public function actionWithDataAndLastInsertId($sql){
        $this->pdo->query($sql);
        $lastId = $this->pdo->lastInsertId("id");


        return $lastId;
    }
}