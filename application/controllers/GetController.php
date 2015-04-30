<?php

/**
 * Class GetController котроллер для вывода файлов
 */
class GetController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->view->setLayer('main');
	}

	public function actionIndex()
	{
		$this->actionAll();
	}

	/**
	 * Для всех пользователей
	 */
	public function actionAll()
	{
		$fileTable = new FileTable();
		$files = $fileTable->getAll();
		$this->view->addContent('files', $files);
		$this->view->setMenuActive('all');
		$this->view->render('getAll');
	}

	/**
	 * Для текущего пользователя
	 */
	public function actionUser()
	{
		$userId = App::getUser()->getId();
		$files = FileTable::getModel()->getByUser($userId);
		$this->view->addContent('files', $files);
		$this->view->setMenuActive('user');
		$this->view->render('getUser');
	}
}