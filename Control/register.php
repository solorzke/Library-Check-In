<?php
session_start();
require('../Model/db_query.php');

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['card-number']) && isset($_POST['patron-name'])){
	$fname = ucwords(filter_input(INPUT_POST, 'fname'));
	$lname = ucwords(filter_input(INPUT_POST, 'lname'));
	$email = filter_input(INPUT_POST, 'email');
	$cardno = filter_input(INPUT_POST, 'card-number');
	$patron = filter_input(INPUT_POST, 'patron-name');
	if(Query::verify($cardno, $patron, $fname, $lname, $email) == False){
		Query::register($fname, $lname, $email, $cardno, $patron);
		header('Location: ../View/login.html');
	}

	else{
		header('Location: ../View/register.html');
	}
}

else{ header('Location: ../View/login.html'); }

?>