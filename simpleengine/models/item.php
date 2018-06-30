<?php
/**
 * Created by PhpStorm.
 * User: 1234
 * Date: 16.07.2017
 * Time: 11:45
 */

namespace simpleengine\models;


use simpleengine\core\Application;

class Item
{
    private $id;
    private $title;
    private $price;
    private $smallImagePath;
    private $bigImagePath;
    private $size;
    private $color;
    private $category;
    private $description;
    private $material;
    private $designer;
    private $quantity;
    private $delivery;
    private $basketRow;

    /**
     * Item constructor.
     * @param $id
     * @param $title
     * @param $price
     * @param $smallImagePath
     * @param $bigImagePath
     * @param $size
     * @param $color
     * @param $category
     * @param $description
     * @param $material
     * @param $designer
     * @param $quantity
     * @param $delivery
     * @param $basketRow
     */
    public function __construct($id, $title, $price, $smallImagePath, $bigImagePath, $size,
                                $color, $category, $description, $material, $designer,
                                $quantity, $delivery, $basketRow)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->smallImagePath = $smallImagePath;
        $this->bigImagePath = $bigImagePath;
        $this->size = $size;
        $this->color = $color;
        $this->category = $category;
        $this->description = $description;
        $this->material = $material;
        $this->designer = $designer;
        $this->quantity = $quantity;
        $this->delivery = $delivery;
        $this->basketRow = $basketRow;
    }


    public function getItem($destination){

    }

    public function getItemForCart(){

    }

    public function getItemForCardItem(){

    }

    public static function getItemFodCatalogOrAdminPart($isCatalog){
        
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getBigImagePath()
    {
        return $this->bigImagePath;
    }

    /**
     * @return mixed
     */
    public function getSmallImagePath()
    {
        return $this->smallImagePath;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @return mixed
     */
    public function getDesigner()
    {
        return $this->designer;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return mixed
     */
    public function getBasketRow()
    {
        return $this->basketRow;
    }
    
    public function calculateSubtotal()
    {
        return $this->price * $this->quantity;
    }

    public function delete(){

        $query = "DELETE FROM products WHERE id=".$this->id.";
                  DELETE FROM product_properties_values WHERE id_product=".$this->id;

        $this->itemCrUD($query);
    }

    public function update()
    {
        $query = "UPDATE products AS prod SET prod.title = '$this->title', 
                  prod.price = $this->price WHERE prod.id = $this->id;
                  UPDATE product_properties_values AS pr_val
                  SET pr_val.property_value = '$this->description' 
                  WHERE pr_val.id_product = $this->id 
                  AND pr_val.id_property = 6;
                  UPDATE product_properties_values AS pr_val
                  SET pr_val.property_value = '$this->material' 
                  WHERE pr_val.id_product = $this->id 
                  AND pr_val.id_property = 7;
                  UPDATE product_properties_values AS pr_val
                  SET pr_val.property_value = '$this->designer' 
                  WHERE pr_val.id_product = $this->id 
                  AND pr_val.id_property = 8";

        $this->itemCrUD($query);
    }


    public function create(){

        $app = Application::instance();

        $query = "INSERT INTO products(title, price) VALUES ('$this->title', $this->price)";

        echo $query;
        
        $this->id = $app->db()->actionWithDataAndLastInsertId($query);

        $query = "INSERT INTO product_properties_values(id_product, id_property,
                  property_value) VALUES ($this->id, 6, '$this->description');
                  INSERT INTO product_properties_values(id_product, id_property,
                  property_value) VALUES ($this->id, 7, '$this->material');
                  INSERT INTO product_properties_values(id_product, id_property,
                  property_value) VALUES ($this->id, 8, '$this->designer');";

        echo $query;

        $this->itemCrUD($query);
    }

    private function itemCrUD($query){

        $app = Application::instance();
        $app->db()->actionWithDataBySqlQuery($query);
    }
}