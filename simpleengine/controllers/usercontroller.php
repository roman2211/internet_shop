<?php
ы

namespace simpleengine\controllers;
use simpleengine\models\User;

session_start();

class UserController extends AbstractController
{

    public function actionIndex()
    {
        // Личный кабинет пользователя

        // создать экземпляр модели пользователя
        // получить данные

        $user = User::auth();

        if ($user == null){
            echo "Incorrect email or pass!";
        }
        else {
            echo $this->render("account", ["userName" => $user->getFirstname()]);
        }
    }
}