<?php
session_start();
require('../Model/db_query.php');

$user = Query::getUserInfo($_SESSION['name']);
$_SESSION['user'] = $user;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login';
    }
}


if($action == 'home'){
	include '../View/home.php';
}

if($action == 'transactions'){
	$transaction = filter_input(INPUT_POST, 'transaction');
	if($transaction == 'view_record'){
		
		include '../View/view_records.php';
	}

	elseif($transaction == 'search_book'){
		include '../View/search.php';
	}

	elseif($transaction == 'return_book'){
		include '../View/return.php';
	}

	else{
		header('Location: index.php?action=login');
	}
}

?>