<?php

/**
 * Class View класс для генерации видов
 */
class View
{

	public $title;
	protected $content = array();
	protected $layer = 'empty';

	/**
	 * @param string $layer
	 */
	public function __construct($layer = '')
	{
		if (!empty($layer)) {
			$this->setLayer($layer);
		}
	}

	public function addContent($key, $value)
	{
		$this->content[$key] = $value;
	}

	/**
	 * Установить слой
	 * @param $layer
	 */
	public function setLayer($layer)
	{
		$this->layer = $layer;
	}

	public function setMenuActive($menu)
	{
		$menuActive = 'active' . ucfirst($menu);
		$this->addContent($menuActive, 'active');
	}

	/**
	 * Генерируем страницу по шаблону накладывая на слой
	 * @param $template
	 * @param array $content
	 */
	public function render($template, $content = array())
	{
		$this->content = array_merge($this->content, $content);
		extract($this->content);


		$pathLayer = App::getApplicationDir() . 'views' . DIRECTORY_SEPARATOR . 'layer' . DIRECTORY_SEPARATOR;
		$fileLayer = $pathLayer . $this->layer . '.php';
		@include $fileLayer;
	}

}
