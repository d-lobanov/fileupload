<?php

class UserException extends Exception{

}

/**
 * Class User класс для работы с пользователем
 */
class User{

    const ERROR_PASS_LENGTH = 1;
    const ERROR_CONFIRM = 2;
    const ERROR_INCORRECT_EMAIL = 3;
    const ERROR_DUPLICATE = 4;

    protected $email;

    public function __construct(){

    }

    /**
     * @return bool
     */
    public function isGuest(){
        return isset($_SESSION['__id']) ? false : true;
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password){
        $user = UserTable::getModel()->getByEmail($email);

        if($user === null){
            return false;
        }

        if($user['password'] != md5($password)){
            return false;
        }

        $_SESSION['__email'] = $user['email'];
        $_SESSION['__id'] = $user['id'];
        return true;
    }

    public function logout(){
        session_destroy();
    }

    /**
     * @param $email
     * @param $password
     * @param $confirm
     * @return bool
     * @throws UserException
     */
    public function register($email, $password, $confirm){
        if(strlen($password) < 8){
            throw new UserException('Pass length', self::ERROR_PASS_LENGTH);
        }

        if($password !== $confirm){
            throw new UserException('Confirm password', self::ERROR_CONFIRM);
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            throw new UserException('Email', self::ERROR_INCORRECT_EMAIL);
        }

        $duplicate = UserTable::getModel()->getByEmail($email);
        if($duplicate !== false){
            throw new UserException('Duplicate', self::ERROR_DUPLICATE);
        }

        $password = md5($password);
        return UserTable::getModel()->insert($email, $password);
    }

    /**
     * @return string
     */
    public function getEmail(){
        return $_SESSION['__email'];
    }

    /**
     * @return string
     */
    public function getId(){
        return $_SESSION['__id'];
    }


}