<?php
/**
 * Created by PhpStorm.
 * User: 1234
 * Date: 03.07.2017
 * Time: 15:00
 */

namespace simpleengine\models;


use simpleengine\core\Application;

class CardItem
{
    private $item;

    /**
     * CardItem constructor.
     * @param id
     */
    public function __construct($id)
    {
        $this->getItemData($id);
    }

    /**
     * @return item
     */
    public function getItem()
    {
        return $this->item;
    }

    public function getItemData($id){

        $app = Application::instance();
        $resultQuery = $app->db()->getArrayBySqlQuery("SELECT prod.title, prod.price,
                                      prop_val.id_property, prop_val.property_value FROM products AS prod, 
                                      product_properties_values AS prop_val WHERE prod.id =".$id." AND 
                                      prop_val.id_product = prod.id AND prop_val.id_property > 1");

        $sizes = [];
        $colors = [];

        foreach($resultQuery as $resultItem){
            if($resultItem["id_property"] == 2)
                $bigImagePath = $resultItem["property_value"];
            elseif($resultItem["id_property"] == 3)
                $sizes[] = $resultItem["property_value"];
            elseif($resultItem["id_property"] == 4)
                $colors[] = $resultItem["property_value"];
            elseif($resultItem["id_property"] == 5)
                $category = $resultItem["property_value"];
            elseif($resultItem["id_property"] == 6)
                $description = $resultItem["property_value"];
            elseif($resultItem["id_property"] == 7)
                $material = $resultItem["property_value"];
            else
                $designer = $resultItem["property_value"];
        }

        $this->item = new Item($id, $resultQuery[0]["title"], $resultQuery[0]["price"], null,
                      $bigImagePath, $sizes, $colors, $category, $description, $material,
                      $designer);
    }
}