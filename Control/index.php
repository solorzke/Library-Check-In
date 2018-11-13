<?php
session_start();
require('../Model/db_query.php');

$user = Query::getUserInfo($_SESSION['name']);
$confirm = filter_input(INPUT_GET, 'confirm');
$_SESSION['user'] = $user;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}


if($action == 'home'){
	include '../View/home.php';
}

if($action == 'view_record'){
	$records = Query::getAllUserInfo($_SESSION['name']);
	if($records == false) { header('Location: index.php?action=home&confirm=no'); }
	else{ include '../View/view_records.php'; } 
}

if($action == 'search_book'){
	include '../View/search.php';
}

if($action == 'return_book'){
	$records = Query::getAllUserInfo($_SESSION['name']);
	include '../View/return.php';
}


if($action == 'search'){
	$book_title = ucwords(filter_input(INPUT_POST, 'book-title'));
	$fauthor = ucwords(filter_input(INPUT_POST, 'fauthor'));
	$lauthor = ucwords(filter_input(INPUT_POST, 'lauthor'));
	$month = sprintf("%02d", rand(01, 12));
	$day = sprintf("%02d", rand(01, 31));
	$callno = mt_rand(100000, 999999);
	$duedate = "2018-"."$month"."-"."$day";
	if(Query::findBook($book_title, $fauthor, $lauthor) == True){
		//ADD CODE THAT CONFIRMS BOOK WAS ADDED.
		Query::orderBook($_SESSION['user']->getFName(), $_SESSION['user']->getLName(),$_SESSION['user']->getCardNo(), $_SESSION['user']->getEmail(), $book_title, $fauthor, $lauthor, $callno, $duedate, $_SESSION['user']->getPatronName());
		header('Location: index.php?action=search_book&confirm=yes');
	}
	else{
		//ADD CODE THAT ALERTS USER THE BOOK WAS REQUESTED
		header('Location: index.php?action=search_book&confirm=no');
	}
}

if($action == 'return'){
	$id = filter_input(INPUT_POST, 'id');
	Query::returnBook($id);
	header('Location: index.php?action=return_book&confirm=yes');
}

if ($action == 'sign_out') {
	if (session_destroy()) {
		header('Location: ../View/login.html');
	}
}

?>