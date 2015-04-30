<?php

/**
 * Class LoginController аутентификация и регистрация
 */
class LoginController extends Controller
{

	public function actionIndex()
	{
		$this->actionLogin();
	}

	public function beforeAction()
	{
		if (!App::getUser()->isGuest()) {
			Route::redirect(Route::CONTROLLER_DEFAULT);
		}
	}

	/**
	 * Логин пользователя
	 */
	public function actionLogin()
	{
		if (isset($_POST['login'])) {
			list($email, $password) = array($_POST['email'], $_POST['password']);
			if (App::getUser()->login($email, $password)) {
				Route::redirect(Route::CONTROLLER_DEFAULT);
			}
			$this->view->addContent('error', 'Incorrect');
		}
		$this->view->render('login');
	}

	/**
	 * Регистрация
	 */
	public function actionRegister()
	{
		if (isset($_POST['register'])) {
			try {
				$result = App::getUser()->register(
					$_POST['email'],
					$_POST['password'],
					$_POST['confirm']
				);
			} catch (UserException $e) {
				$this->view->addContent('errorMessage', $e->getMessage());
				$result = false;
			}

			if ($result) {
				App::getUser()->login($_POST['email'], $_POST['password']);
				Route::redirect(Route::CONTROLLER_DEFAULT);
			}
		}
		$this->view->render('register');
	}

}