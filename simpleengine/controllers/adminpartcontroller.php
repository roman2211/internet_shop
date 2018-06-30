<?php
/**
 * Created by PhpStorm.
 * User: 1234
 * Date: 01.08.2017
 * Time: 11:27
 */

namespace simpleengine\controllers;

use simpleengine\models\CardItem;
use simpleengine\models\Catalog;
use simpleengine\models\Item;

session_start();

class AdminPartController extends AbstractController
{
    public function actionIndex()
    {
        if (isset($_SESSION["userId"])){
            if ($_SESSION["isAdmin"]){
                $catalog = new Catalog(false, null, null);

                $content = $this->render("products", ["itemArray" => $catalog->getItemArray()]);
                echo $this->renderSkeleton("Products management", $content);
            }
            else {
                echo "Access denied. You are not the administrator";
            }
        }
        else {
            echo "You need to log into your account!";
        }
    }
    
    public function actionGetModalWindow(){

        if($_GET["isNew"]){
            echo $this->render("modal_for_new");
        }
        else {

            $cardItem = new CardItem($_GET["idItem"]);
            echo $this->render("modal_window", ["item" => $cardItem->getItem()]);
        }

    }
    
    public function actionUpdateItem(){

        $item = new Item($_GET["idItem"], $_GET["title"], $_GET["price"], null, null, null, null,
                null, $_GET["description"], $_GET["material"], $_GET["designer"],
                null, null, null);

        $item->update();
    }

    public function actionDeleteItem(){
        $item = new Item($_GET["idItem"], null, null, null, null, null, null, null, null,
                null, null, null, null, null);
        $item->delete();
    }

    public function actionCreateItem(){
        $item = new Item(null, $_GET["title"], $_GET["price"], null, null, null, null,
            null, $_GET["description"], $_GET["material"], $_GET["designer"],
            null, null, null);

        $item->create();
    }
}