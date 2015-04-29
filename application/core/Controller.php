<?php

/**
 * Class Controller базовый контроллер
 */
abstract class Controller{

    protected $view;

    public function __construct(){
        $this->view = new View();
        $this->view->title = str_replace('Controller', '', __CLASS__);
    }

    public function beforeAction(){
        if (App::getUser()->isGuest()){
            Route::redirect(Route::CONTROLLER_LOGIN);
        }
    }

    abstract public function actionIndex();

}