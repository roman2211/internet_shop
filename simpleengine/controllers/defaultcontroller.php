<?php


namespace simpleengine\controllers;
use simpleengine\models\DefaultModel;

session_start();

class DefaultController extends AbstractController
{
    public function actionIndex()
    {
        if (isset($_GET["isOut"]) && $_GET["isOut"]) {
            unset($_SESSION["email"]);
            unset($_SESSION["pass"]);
            unset($_SESSION["userId"]);
            session_destroy();
        }

        $content = $this->render("index");
        echo $this->renderSkeleton("Main", $content);
    }
}