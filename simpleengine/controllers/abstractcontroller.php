<?php


namespace simpleengine\controllers;

use simpleengine\core\Application;
use simpleengine\core\exception\ApplicationException;

abstract class AbstractController
{
    protected $requestedAction = "index";

    abstract public function actionIndex();

    protected function render(string $template = "", array $variables = []) : string{
        if($template == "")
            $template = $this->requestedAction;

        $dir = Application::instance()->get("DIR")["VIEWS"];
        $dir .= mb_strtolower(substr(Application::instance()->router()->getController(), 0, -10), "UTF-8");

        try {
            $loader = new \Twig_Loader_Filesystem($dir);
            $twig = new \Twig_Environment($loader, []);
        }
        catch(\Exception $e){
            throw new ApplicationException("Template " . $dir . $template . " not found", 0504);
        }

        return $twig->render($template.".tmpl", $variables);
    }

    protected function renderSkeleton($pageName, $content){
        try {
            $loader = new \Twig_Loader_Filesystem("/data/gb.local/docs/public/../simpleengine/views/skeleton");
            $twig = new \Twig_Environment($loader);
        }
        catch(\Exception $e){
            throw new ApplicationException("Template skeleton.tmpl not found", 0504);
        }

        if (isset($_SESSION["userId"])){
            $enterRef = "";
            $display = "block";
        }
        else {
            $enterRef = "Log in";
            $display = "none";
        }


        return $twig->render("skeleton.tmpl", ["pageName" => $pageName,
               "inOrOut" => $enterRef, "display" => $display, "content" => $content]);
    }

    public function setRequestedAction(string $actionName){
        $this->requestedAction = $actionName;
    }
}