<?php
include 'user.php';
include 'database.php';

class Query{

	public static function verify($user){
		$db = Database::getDB();
		$patronName = $user->getPatronName();
		$cardNo = $user->getCardNo();
		$query = 'SELECT id FROM kas58.records WHERE patronName = :patronName AND cardNo = :cardNo';
		$statement = $db->prepare($query);		
		$statement->bindValue(':patronName', "$patronName");
		$statement->bindValue(':cardNo', "$cardNo");
		$statement->execute();

		$rowCount = $statement->rowCount();
		$statement->closeCursor();

		if($rowCount == 1){ return True; }
		else{ return False; }
	}

	public static function getUserInfo($patronName){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.records WHERE patronName = :patronName';
		$statement = $db->prepare($query);
		$statement->bindValue(':patronName', "$patronName");
		$statement->execute();
		$record = $statement->fetchAll();
		$statement->closeCursor();
		$user;

		foreach($record as $rec){
			$user = new User($rec[0], $rec[1],$rec[2],$rec[3],$rec[4], $rec[5],$rec[6],$rec[7],$rec[8],$rec[9],
				$rec[10], $rec[11], $rec[12]);
		}
		return $user;
	}

	public static function getAllUserInfo($patronName){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.records WHERE patronName = :patronName';
		$statement = $db->prepare($query);
		$statement->bindValue(':patronName', "$patronName");
		$statement->execute();
		$record = $statement->fetchAll();
		$statement->closeCursor();
		return $record;
	}

}
?>