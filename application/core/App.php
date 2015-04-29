<?php

/**
 * Class App класс доступный всему приложению, включает в себя фабрику для db, user, route
 * Загружает в себя конфигурацию приложения
 *
 */
final class App{

	private static $config;
	private static $db;
	private static $user;

	private function __construct(){}

	/**
	 * Загрузка конфигураций
	 * @param $config
	 */
	public static function loadConfig($config){
		self::$config = $config;
	}

	/**
	 * @return PDO
	 */
	public static function getDbConnection(){
		if(isset(self::$db)){
			return self::$db;
		}

		if(isset(self::$config['db'])){
			$db = self::$config['db'];
			self::$db = new PDO($db['dsn'], $db['user'], $db['password']);

			return self::$db;
		}

		return null;
	}

	/**
	 * @return User
	 */
	public static function getUser(){
		if(!isset(self::$user)){
			$classUser = self::$config['user'];
			self::$user = new $classUser();
		}
		return self::$user;
	}

	/**
	 * @return string
	 */
	public static function getUploadDir(){
		$uploadDir = isset(self::$config['uploadDir']) ? self::$config['uploadDir'] : 'files';
		if(!file_exists($uploadDir)){
			mkdir($uploadDir, 0700);
		}
		$path  = self::getProjectDir(). $uploadDir. DIRECTORY_SEPARATOR;
		return $path;
	}

	public static function getApplicationDir(){
		return self::getProjectDir(). 'application'. DIRECTORY_SEPARATOR;
	}

	public static function getProjectDir(){
		$path  = rtrim(dirname($_SERVER['SCRIPT_FILENAME']), '/\\'). DIRECTORY_SEPARATOR;
		return $path;
	}

	/**
	 * @return Route
	 */
	public static function getRoute(){
		$route = isset(self::$config['route']) ? self::$config['route'] : 'Route';
		return $route;
	}

	/**
	 * Запуск роутинга
	 */
	public static function run(){
		$route = self::getRoute();
		$route::run();
	}

}