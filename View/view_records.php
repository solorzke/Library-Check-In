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
			<?php foreach($records as $record): ?>
			<tr>
				<td><?php echo "{$record->getID()}";	?></td>
				<td><?php echo "{$record->getFName()}";	?></td>
				<td><?php echo "{$record->getLName()}";	?></td>
				<td><?php echo "{$record->getCardNo()}";	?></td>
				<td><?php echo "{$record->getEmail()}";	?></td>
				<td><?php echo "{$record->getBookTitle()}";	?></td>
				<td><?php echo "{$record->getFAuthor()}";	?></td>
				<td><?php echo "{$record->getLAuthor()}";	?></td>
				<td><?php echo "{$record->getCallNo()}";	?></td>
				<td><?php echo "{$record->getDate()}";	?></td>
				<td><?php echo "{$record->getOnOrder()}";	?></td>
				<td><?php echo "{$record->getAuthorOrder()}";	?></td>
				<td><?php echo "{$record->getPatronName()}";	?></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<a href="../Control/index.php?action=home">Home</a>
	</body>
</html>