<?php

/**
 * Class LogoutController разлогин пользователя
 */
class LogoutController extends Controller{

    public function actionIndex(){
        App::getUser()->logout();
        Route::redirect(Route::CONTROLLER_LOGIN);
    }

}