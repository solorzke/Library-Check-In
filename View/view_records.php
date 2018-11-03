<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>IT202 - HW4</title>
	</head>
	<body>
		<h1>View Records!</h1>
		<table>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Card No.</th>
				<th>Email</th>
				<th>Book Title</th>
				<th>Author (First)</th>
				<th>Author (Last)</th>
				<th>Call No.</th>
				<th>Due Date</th>
				<th>On Order</th>
				<th>Author On Order</th>
				<th>Patron Name</th>
			</tr>
			<tr>
				<td><?php echo "{$_SESSION['user']->getID()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getFName()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getLName()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getCardNo()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getEmail()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getBookTitle()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getFAuthor()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getLAuthor()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getCallNo()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getDueDate()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getOnOrder()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getAuthorOrder()}";	?></td>
				<td><?php echo "{$_SESSION['user']->getPatronName()}";	?></td>
			</tr>
		</table>
		<a href="../Control/index.php?action=home">Home</a>
	</body>
</html>