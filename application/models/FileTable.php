<?php

/**
 * Class FileTable модель таблицы file
 */
class FileTable extends DbStorage
{

	public function insert($url, $origName, $userId)
	{
		$insert = $this->db->prepare('INSERT INTO file (url, name, user_id) VALUES (:url, :name, :user_id)');
		$insert->bindParam(':url', $url, PDO::PARAM_STR);
		$insert->bindParam(':name', $origName, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $userId, PDO::PARAM_INT);
		return $insert->execute();
	}

	public function getAll()
	{
		$select = $this->db->prepare('
            SELECT f.name, f.url, u.email
                FROM file AS f
                  LEFT JOIN user AS u ON u.id = f.user_id
                ORDER BY f.id DESC');
		$select->execute();
		return $select->fetchAll();
	}

	public function getByUser($userId)
	{
		$userId = (int)$userId;
		$select = $this->db->prepare('SELECT name, url FROM file WHERE user_id = :user_id ORDER BY id DESC');
		$select->bindParam(':user_id', $userId, PDO::PARAM_INT);
		$select->execute();
		return $select->fetchAll();
	}

}
