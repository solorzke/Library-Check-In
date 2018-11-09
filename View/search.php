<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>IT202 - HW4</title>
	</head>
	<body>
		<a href="../Control/index.php?action=sign_out">Log Out</a>
		<h1>View Search!</h1>
		<form method="POST" action="../Control/index.php">
			<input type="hidden" name="action" value="search">
			<label>Enter Book Title: </label>
			<input type="text" name="book-title">
			<label>Enter Author's First Name: </label>
			<input type="text" name="fauthor">
			<label>Enter Author's Last Name: </label>
			<input type="text" name="lauthor">
			<input type="submit" name="Submit" value="Confirm">
		</form>
		<?php 
			if(isset($confirm)){
				if($confirm == 'yes'){
					echo "<script type='text/javascript'>alert('Book is now added to your account!');</script>";
				}

				elseif($confirm == 'no'){
					echo "<script type='text/javascript'>alert('Book wasnt found but has been requested!');</script>";
				}

				else{
					echo "<script type='text/javascript'>alert('Something wrong happened!');</script>";
				}
			}
		?>
		<a href="../Control/index.php?action=home">Home</a>
	</body>
</html>