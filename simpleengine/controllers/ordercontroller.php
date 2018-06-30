<?php


namespace simpleengine\controllers;

use simpleengine\models\Basket;
use simpleengine\models\Order;

session_start();

class OrderController extends AbstractController
{

    public function actionIndex()
    {
        // ���������� ������ �������� ������������

        // ���� ������������ �� ���������, �� ���������� ��� �� �������� �����������
    }

    public function actionCreateOrder(){
        $newId = Order::create($_SESSION["userId"], $_GET["amount"]);
        $basket = new Basket($_SESSION["userId"]);
        $basket->update($newId, null);
    }

}