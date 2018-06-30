<?php


namespace simpleengine\models;


use simpleengine\core\Application;

class Order implements DbModelInterface
{

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public static function create($idUser, $amount){

        $app = Application::instance();

        $query = "INSERT INTO orders (id_user, amount, id_order_status) 
                  VALUES (" .$idUser. ", " .$amount. ", 1)";
        $insertId = $app->db()->actionWithDataAndLastInsertId($query);

        return $insertId;
    }
}