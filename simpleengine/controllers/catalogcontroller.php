<?php
/**
 * Created by PhpStorm.
 * User: 1234
 * Date: 15.07.2017
 * Time: 18:56
 */

namespace simpleengine\controllers;
use simpleengine\models\Catalog;

session_start();

class CatalogController extends AbstractController
{
    
    public function actionIndex()
    {
        $catalog = new Catalog(true, 0, 8);
        
        $content = $this->render("catalog", ["itemArray" => $catalog->getItemArray()]);
        echo $this->renderSkeleton("Catalog", $content);
    }

    public function actionMoreItems(){
        
        $catalog = new Catalog(true, $_GET["start"], 4);
        echo $this->render("moreitem", ["itemArray" => $catalog->getItemArray()]);

    }
}