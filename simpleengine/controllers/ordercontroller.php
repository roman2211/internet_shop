<?php


namespace simpleengine\controllers;

use simpleengine\models\Basket;
use simpleengine\models\Order;

session_start();

class OrderController extends AbstractController
{

    public function actionIndex()
    {
        // показывать заказы текущего пользователя

        // если пользователь не залогинен, то переводить его на страницу авторизации
    }

    public function actionCreateOrder(){
        $newId = Order::create($_SESSION["userId"], $_GET["amount"]);
        $basket = new Basket($_SESSION["userId"]);
        $basket->update($newId, null);
    }

}