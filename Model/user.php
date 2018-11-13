<?php

class User{
	private $id, $patronName, $cardNo, $fname, $lname, $email, $booktitle, $fauthor, $lauthor, $callnumber, $duedate, $onorder, $authororder;


	public function __construct(){
		$get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
	}

	public function __construct2($patronName, $cardNo){
		$this->patronName = $patronName;
		$this->cardNo = $cardNo;
	}

	public function __construct6($id, $fname, $lname, $email, $patronName, $cardno){
		$this->id = $id;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->patronName = $patronName;
		$this->cardNo = $cardno;
	}

	function __construct13($id, $fname, $lname, $cardNo, $email, $booktitle, $fauthor, $lauthor, $callnumber, $duedate, $onorder, $authororder, $patronName){
		$this->id = $id;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->cardNo = $cardNo;
		$this->email = $email;
		$this->booktitle = $booktitle;
		$this->fauthor = $fauthor;
		$this->lauthor = $lauthor;
		$this->callnumber = $callnumber;
		$this->duedate = $duedate;
		$this->onorder = $onorder;
		$this->authororder = $authororder;
		$this->patronName = $patronName;
	}

	public function getPatronName(){ return $this->patronName; }

	public function setPatronName($patronName){ $this->patronName = $patronName; }

	public function getCardNo(){ return $this->cardNo; }

	public function setCardNo($cardNo) { $this->cardNo = $cardNo; } 

	public function getID(){ return $this->id; }

	public function setID($id){ $this->id = $id; }

	public function getFName(){ return $this->fname; }

	public function setFName($fname){ $this->fname = $fname; }

	public function getLName(){ return $this->lname; }

	public function setLName($lname){ $this->lname = $lname; }

	public function getEmail(){ return $this->email; }

	public function setEmail($email) { $this->email = $email; }

	public function getBookTitle(){ return $this->booktitle; }

	public function setBookTitle($booktitle){ $this->booktitle = $booktitle; }

	public function getFAuthor(){ return $this->fauthor; }

	public function setFAuthor($fauthor){ $this->fauthor = $fauthor; }

	public function getLAuthor(){ return $this->lauthor; }

	public function setLAuthor($lauthor){ $this->lauthor = $lauthor; }

	public function getCallNo(){ return $this->callnumber; }

	public function setCallNo($callnumber){ $this->callnumber = $callnumber; }

	public function getDate(){ return $this->duedate; }

	public function setDate($duedate){ $this->duedate = $duedate; }

	public function getOnOrder() { return $this->onorder; }

	public function setOnOrder($onorder){ $this->onorder = $onorder; }

	public function getAuthorOrder(){ return $this->authororder; }

	public function setAuthorOrder($authororder){ $this->authororder = $authororder; }
}
?>