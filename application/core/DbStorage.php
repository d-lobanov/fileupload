<?php

/**
 * Class DbStorage абстракция для работы с базой
 */
abstract class DbStorage{

    protected $db;

    public function __construct(PDO $db = null){
        $this->db = (is_null($db)) ? App::getDbConnection() : $db;
    }

    static function getModel(){
        return new static();
    }

    public function getDbConnection(){
        return $this->db;
    }

}