<?php
include 'user.php';
include 'database.php';

class Query{
	/*
	public static function verify($user){
		$db = Database::getDB();
		$patronName = $user->getPatronName();
		$cardNo = $user->getCardNo();
		$query = 'SELECT id FROM kas58.patrons WHERE patronName = :patronName AND cardNo = :cardNo';
		$statement = $db->prepare($query);		
		$statement->bindValue(':patronName', "$patronName");
		$statement->bindValue(':cardNo', "$cardNo");
		$statement->execute();

		$rowCount = $statement->rowCount();
		$statement->closeCursor();

		if($rowCount == 1){ return True; }
		else{ return False; }
	}
	*/

	public static function verify($cardno, $patronname, $fname = null, $lname = null, $email = null){
		$db = Database::getDB();
		//Verification for registering new user -> checking to see if data already exists!
		if($fname != null && $lname != null && $email != null ){
			if(self::emailExists($email) == True || self::patronExists($patronname) == True || self::cardExists($cardno) == True) { return True; }
			else{ return False; }
		}
		else{
			$query = 'SELECT id FROM kas58.patrons WHERE patronName = :patronName AND cardNo = :cardNo';
			$statement = $db->prepare($query);		
			$statement->bindValue(':patronName', "$patronname");
			$statement->bindValue(':cardNo', "$cardno");
			$statement->execute();
			$rowCount = $statement->rowCount();
			$statement->closeCursor();
			if($rowCount == 1){ return True; }
			else{ return False; }
		}

	}


	public static function getUserInfo($patronName){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.patrons WHERE patronName = :patronName';
		$statement = $db->prepare($query);
		$statement->bindValue(':patronName', "$patronName");
		$statement->execute();
		$record = $statement->fetchAll();
		$statement->closeCursor();
		$user;

		foreach($record as $rec){ $user = new User($rec[0], $rec[1],$rec[2],$rec[3],$rec[4], $rec[5]); break; }
		return $user;
	}

	public static function getAllUserInfo($patronName){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.records WHERE patronName = :patronName';
		$statement = $db->prepare($query);
		$statement->bindValue(':patronName', "$patronName");
		$statement->execute();
		$record = $statement->fetchAll();
		$rowCount = $statement->rowCount();
		$statement->closeCursor();

		if($rowCount == 0 || $rowCount == null){ return false; }
		else {
			$i = 0;
			$arr = [];
			foreach($record as $rec){
				$arr[$i] = new User($rec[0], $rec[1],$rec[2],$rec[3],$rec[4], $rec[5],$rec[6],$rec[7],$rec[8],$rec[9],
					$rec[10], $rec[11], $rec[12]);
				$i++;
			}
			return $arr;
		}
	}

	public static function findBook($book, $fauthor, $lauthor){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.books WHERE bookTitle = :book AND authorFirst = :fauthor AND authorLast = :lauthor';
		$statement = $db->prepare($query);
		$statement->bindValue(':book', "$book");
		$statement->bindValue(':fauthor', "$fauthor");
		$statement->bindValue(':lauthor', "$lauthor");
		$statement->execute();
		$num_results = $statement->rowCount();
		$statement->closeCursor();
		if($num_results >= 1){ return True; }
		else{ return False; }
	}
	/*
	public static function addBook($book, $fauthor, $lauthor){
		$db = Database::getDB();
		$query = 'INSERT INTO kas58.books (bookTitle, authorFirst, authorLast, callNumber) VALUES (:book, :fauthor, :lauthor, :callno)';
		$query_2 = 'INSERT INTO kas58.records (bookTitleOnOrder, bookAuthorOnOrder) VALUES (:bookorder, :bookauthor)';
		$statement = $db->prepare($query);
		$statement_2 = $db->prepare($query_2);
		$statement->bindValue(':book', "$book");
		$statement->bindValue(':fauthor', "$fauthor");
		$statement->bindValue(':lauthor', "$lauthor");
		$statement_2->bindValue(':bookorder', "$book");
		$statement_2->bindValue(':bookauthor', "$fauthor"." "."$lauthor");
		$statement->execute();
		$statement_2->execute();

	}
	*/
	public static function orderBook($fname, $lname, $cardno, $email, $book, $fauthor, $lauthor, $callno, $date, $patronName){
		$db = Database::getDB();
		$query = 'INSERT INTO kas58.records (fname, lname, cardNo, email, bookTitle, bookFAuthor, bookLAuthor, callNumber, dueDate, patronName) VALUES(:fname, :lname, :cardno, :email, :book, :fauthor, :lauthor, :callno, :duedate, :patronName)';
		$statement = $db->prepare($query);
		$statement->bindValue(':fname', "$fname");
		$statement->bindValue(':lname', "$lname");
		$statement->bindValue(':cardno', "$cardno");
		$statement->bindValue(':email', "$email");
		$statement->bindValue(':book', "$book");
		$statement->bindValue(':fauthor', "$fauthor");
		$statement->bindValue(':lauthor', "$lauthor");
		$statement->bindValue(':callno', "$callno");
		$statement->bindValue(':duedate', "$date");
		$statement->bindValue(':patronName', "$patronName");
		$statement->execute();
		$statement->closeCursor();
	}

	public static function returnBook($id){
		$db = Database::getDB();
		$query = 'DELETE FROM kas58.records WHERE id = :id';
		$statement = $db->prepare($query);
		$statement->bindValue(':id', "$id");
		$statement->execute();
		$statement->closeCursor();
	}

	public static function register($fname, $lname, $email, $cardno, $patronname){
		$db = Database::getDB();
		$query = 'INSERT INTO kas58.patrons (fname, lname, email, patronName, cardNo) VALUES (:fname, :lname, :email, :patronname, :cardno)';
		$statement = $db->prepare($query);
		$statement->bindValue(':fname', "$fname");
		$statement->bindValue(':lname', "$lname");
		$statement->bindValue(':email', "$email");
		$statement->bindValue(':patronname', "$patronname");
		$statement->bindValue(':cardno', "$cardno");
		$statement->execute();
		$statement->closeCursor();
	}

	/*
	public static function patronExists($fname, $lname, $email, $cardno, $patronname){
		$db = Database::getDB();
		$query = 'SELECT * FROM kas58.patrons WHERE fname = :fname AND lname = :lname AND email = :email AND patronName = :patronname AND cardNo = :cardno';
		$statement = $db->prepare($query);
		$statement->bindValue(':fname', "$fname");
		$statement->bindValue(':lname', "$lname");
		$statement->bindValue(':email', "$email");
		$statement->bindValue(':patronname', "$patronname");
		$statement->bindValue(':cardno', "$cardno");
		$statement->execute();
		$statement->closeCursor();
	}
*/
	public static function emailExists($email){
		$db = Database::getDB();
		$query = 'SELECT email FROM kas58.patrons WHERE email = :email';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', "$email");
		$statement->execute();
		$rowCount = $statement->rowCount();
		$statement->closeCursor();
		if($rowCount == 1){ return True; }
		else{ return False; }
	}

	public static function patronExists($patron){
		$db = Database::getDB();
		$query = 'SELECT patronName FROM kas58.patrons WHERE patronName = :patron';
		$statement = $db->prepare($query);
		$statement->bindValue(':patron', "$patron");
		$statement->execute();
		$rowCount = $statement->rowCount();
		$statement->closeCursor();
		if($rowCount == 1){ return True; }
		else{ return False; }
	}

	public static function cardExists($cardno){
		$db = Database::getDB();
		$query = 'SELECT cardNo FROM kas58.patrons WHERE cardNo = :cardno';
		$statement = $db->prepare($query);
		$statement->bindValue(':cardno', "$cardno");
		$statement->execute();
		$rowCount = $statement->rowCount();
		$statement->closeCursor();
		if($rowCount == 1){ return True; }
		else{ return False; }
	}
}
?>