<?php

/**
 * Class PutController котроллер для записи файла на сервер
 */
class PutController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->view->setLayer('main');
	}

	/**
	 * Загружает файлы на сервер
	 * @param array $file включает оригинальное и временное имя
	 * @return bool
	 */
	public function loadFile($file)
	{
		$result = false;
		$pathFile = App::getUploadDir() . uniqid();

		if (move_uploaded_file($file['tmp_name'], $pathFile)) {
			$userId = App::getUser()->getId();
			$result = FileTable::getModel()->insert($pathFile, $file['name'], $userId);
		}
		return $result;
	}

	public function actionIndex()
	{
		if (isset($_POST['put'])) {
			if ($this->loadFile($_FILES['file'])) {
				$this->view->addContent('success', 'Success');
			} else {
				$this->view->addContent('error', 'Error');
			}
		}
		$this->view->setMenuActive('put');
		$this->view->render('put');
	}

}