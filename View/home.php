<?php session_start(); 

if(isset($confirm)){
	if($confirm == 'no'){ echo "<script type='text/javascript'>alert('No Record Exists! Create Record by Searching and Requesting a book.'); </script>"; }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>IT202 - HW4</title>
	</head>
	<body>
		<a href="../Control/index.php?action=sign_out">Log Out</a>
		<h1>Welcome <?php echo "{$_SESSION['user']->getPatronName()}"; ?> </h1>
		<h1>Patron Card Number: <?php echo "{$_SESSION['user']->getCardNo()}"; ?></h1>
		<form method="POST" action="../Control/index.php">
			<label>Select a Transaction: </label>
			<select name="action">
				<option value="view_record">View Records</option>
				<option value="search_book">Search Book</option>
				<option value="return_book">Return a Book</option>
			</select>
			<input type="submit" name="Submit" value="Confirm">
		</form>
	</body>
</html>


<!--{$_SESSION['user']->getPatronName()} -->