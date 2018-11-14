<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>IT202 - HW4</title>
		<link rel="stylesheet" type="text/css" href="../index.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	</head>
	<body>
		<a href="../Control/index.php?action=sign_out">Log Out</a>
		<h1>View Search!</h1>
		<form method="POST" action="../Control/index.php">
			<input type="hidden" name="action" value="search">
			<label>Enter Book Title: </label>
			<input type="text" name="book-title" REQUIRED>
			<br>
			<label>Enter Author's First Name: </label>
			<input type="text" name="fauthor" REQUIRED>
			<br>
			<label>Enter Author's Last Name: </label>
			<input type="text" name="lauthor" REQUIRED>
			<br>
			<input type="submit" name="Submit" value="Confirm">
		</form>
		<a href="../Control/index.php?action=home">Home</a>
		<h3>Book List</h3>
		<table>
			<tr>
				<th>Book Title</th>
				<th>Author's First Name</th>
				<th>Author's Last Name</th>
			</tr>
			<?php foreach($books as $book){ ?>
			<tr>
				<td><?php echo $book[0]."<br>"; ?></td>
				<td><?php echo $book[1]."<br>"; ?></td>
				<td><?php echo $book[2]."<br>"; ?></td>
			</tr>
			<?php } ?>
		</table>
		<?php 
			if(isset($confirm)){
				if($confirm == 'yes'){ 
					echo "<script type='text/javascript'>alert('Book is now added to your account!');</script>";
					echo(
						"<table>
							<tr>
								<th></th>
								<th>Before Changes</th>
								<th>After Changes</th>
							</tr>
							<tr>
								<th>Patron's Account</th>
								<td>Null  =====> </td>
								<td>".$_SESSION['user']->getPatronName()."</td>
							</tr>
							<tr>
								<th>Book Title</th>
								<td>Null  =====> </td>
								<td>".$_SESSION['book-order']."</td>
							</tr>
							<tr>
								<th>Author</th>
								<td>Null  =====> </td>
								<td>".$_GET['author']."</td>
							</tr>
							<tr>
								<th>Call No.</th>
								<td>Null  =====> </td>
								<td>".$_GET['callno']."</td>
							</tr>
							<tr>
								<th>Due Date</th>
								<td>Null  =====> </td>
								<td>".$_GET['duedate']."</td>
							</tr>
						</table>"
					);
				}
				elseif($confirm == 'no'){ echo "<script type='text/javascript'>alert('Book wasnt found but has been requested!');</script>"; }
				else{ echo "<script type='text/javascript'>alert('Something wrong happened!');</script>"; }
			}
		?>
	</body>
</html>