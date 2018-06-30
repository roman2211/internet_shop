<?php
/**
 * Created by PhpStorm.
 * User: 1234
 * Date: 15.07.2017
 * Time: 18:57
 */

namespace simpleengine\models;
use simpleengine\core\Application;

class Catalog
{
    private $itemArray;

    public function __construct($forCatalog, $start, $end){
        $this->getItems($forCatalog, $start, $end);
    }

    public function getItems($forCatalog, $start, $end) {

        $app = Application::instance();
        $this->itemArray = [];

        $query = "SELECT prod.id, prod.title, prod.price, prop_val.property_value  
                  FROM product_properties_values AS prop_val, products AS prod
                  WHERE prop_val.id_property = 1 AND prop_val.id_product = prod.id";
        
        if ($forCatalog){
            $query .= " LIMIT ". $start .", ". $end;
        }

        $resultQuery = $app->db()->getArrayBySqlQuery($query);

        for($i = 0; $i < count($resultQuery); ++$i){
            $this->itemArray[] = new Item($resultQuery[$i]["id"],
                $resultQuery[$i]["title"], $resultQuery[$i]["price"],
                $resultQuery[$i]["property_value"], null,null,null,null,null,
                null,null,null,null,null);
        }

        return $this->itemArray;
    }

    public function getItemArray(){
        return $this->itemArray;
    }
}