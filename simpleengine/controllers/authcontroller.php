<?php


namespace simpleengine\controllers;

use \simpleengine\models\User;

session_start();

class AuthController extends AbstractController
{
    public function actionIndex()
    {
        if (isset($_COOKIE["email"])) {
            $content = $this->render("checkout", ["email" => $_COOKIE["email"], "pass" => $_COOKIE["pass"]]);
        } else {
            $content = $this->render("checkout", ["email" => "", "pass" => ""]);
        }

        echo $this->renderSkeleton("CheckOut", $content);

    }

    public function actionShowAccount(){

        $user = User::auth();

        if ($user == null){
            echo "Incorrect email or pass!";
        }
        else {
            $content = $this->render("account", ["userName" => $user->getFirstname(),
                                     "isAdmin" => $user->isAdmin()]);
           
            echo $this->renderSkeleton("Account", $content);
        }
    }
}