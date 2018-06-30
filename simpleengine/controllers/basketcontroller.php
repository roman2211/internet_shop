<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 24.07.2017
 * Time: 11:06
 */

namespace simpleengine\controllers;
use simpleengine\models\Basket;

session_start();

class BasketController extends AbstractController
{
    public function actionIndex()
    {
        $basket = new Basket($_SESSION["userId"]);
        $content = $this->render("basket", ["productsArray" => $basket->getProductsArray()]);
        echo $this->renderSkeleton("Cart", $content);
    }

    public function actionAddItem() {

        if (isset($_SESSION["userId"])) {
            Basket::addItem($_SESSION["userId"], $_GET["idItem"], $_GET["color"],
                $_GET["size"], $_GET["quantity"]);
            echo "Item added successfully";
        }
        else {
            echo "Sign up to add product to cart!";
        }
    }
    
    public function actionDeleteItem(){
        Basket::deleteItem($_GET["basketRow"]);
    }

    public function actionDeleteBasket(){;
        Basket::delete($_SESSION["userId"]);
    }
}