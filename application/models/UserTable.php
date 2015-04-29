<?php

/**
 * Class UserTable модель таблицы user
 */
class UserTable extends DbStorage{

    public function insert($email, $password){
        $insert = $this->db->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
        $insert->bindParam(':email', $email, PDO::PARAM_STR);
        $insert->bindParam(':password', $password, PDO::PARAM_STR);
        return $insert->execute();
    }

    public function getByEmail($email){
        $select =  $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $select->bindParam(':email', $email, PDO::PARAM_STR);
        $select->execute();
        return $select->fetch();
    }

    public function getIdByEmail($email){
        $select =  $this->db->prepare('SELECT id FROM user WHERE email = :email');
        $select->bindParam(':email', $email, PDO::PARAM_STR);
        $select->execute();
        return $select->fetchColumn();
    }

}
