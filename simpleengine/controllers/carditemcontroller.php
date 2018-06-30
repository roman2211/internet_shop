<?php
/**
 * Created by PhpStorm.
 * User: 1234
 * Date: 03.07.2017
 * Time: 14:58
 */
namespace simpleengine\controllers;
use simpleengine\models\CardItem;

session_start();

class CardItemController extends AbstractController
{
    public function actionIndex()
    {
        $cardItem = new CardItem($_GET["idItem"]);

        $content = $this->render("carditem", ["item" => $cardItem->getItem()]);
        echo $this->renderSkeleton("SinglePage", $content);
    }

    
}