<?php


namespace simpleengine\models;

use simpleengine\core\Application;

class Basket implements DbModelInterface
{
    private $id_user;
    private $productsArray = [];

    public function __construct($id_user){
        if((int)$id_user > 0){
            $this->id_user = $id_user;
            $this->find($id_user);
        }
    }

    public function find($id_user)
    {
        $app = Application::instance();
        $query = "SELECT b.*, p.title, p.price, pval.property_value
                FROM basket b
                LEFT JOIN products p ON p.id=b.id_product
                LEFT JOIN product_properties_values pval ON pval.id_property=1 
                AND pval.id_product=p.id
                WHERE b.id_order IS NULL AND b.id_user=".$id_user;
        $result = $app->db()->getArrayBySqlQuery($query);

        if(!empty($result)){
            foreach($result as $prod){
                $this->productsArray[] = new Item($prod["id_product"], $prod["title"],
                                         $prod["price"], $prod["property_value"], null,
                                         $prod["product_size"], $prod["color"], null, null, null,
                                         null, $prod["quantity"], $prod["delivery"], $prod["id"]);
            }
        }
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function getProductsArray() : array{
        return $this->productsArray;
    }

    public static function addItem($idUser, $idItem, $color, $size, $quantity){
        $app = Application::instance();

        $query = "INSERT INTO basket(id_order, id_user, id_product, delivery, color, product_size, 
                  quantity) VALUES (NULL, $idUser, $idItem, 'FREE', '$color', '$size', 
                                          $quantity)";

        $app->db()->actionWithDataBySqlQuery($query);
    }
    
    public static function deleteItem($basketRow){
        $app = Application::instance();

        $query = "DELETE FROM basket WHERE id=".$basketRow;

        $app->db()->actionWithDataBySqlQuery($query);

    }

    public static function delete($userId){
        $app = Application::instance();

        $query = "DELETE FROM basket WHERE id_user=".$userId." AND id_order IS NULL";

        $app->db()->actionWithDataBySqlQuery($query);
    }

    public function update($newIdOrder, $quantityArray) {
        $app = Application::instance();
        $query = "UPDATE basket SET id_order=". $newIdOrder ." WHERE id_user=".$this->id_user.
                 " AND id_order IS NULL";
        $app->db()->actionWithDataBySqlQuery($query);
    }
}