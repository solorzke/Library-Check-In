<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>IT202 - HW4</title>
	</head>
	<body>
		<a href="../Control/index.php?action=sign_out">Log Out</a>
		<h1>View Return!</h1>
		<h3>Which book would you like to return?</h3>
		<table>
			<?php foreach($records as $record): ?>
			<tr>
				<form method="POST" action="../Control/index.php">
					<input type="hidden" name="action" value="return">
					<input type="hidden" name="id" value='<?php echo "{$record->getID()}"; ?>'>
					<td><input type="submit" name="Submit" value='Return' ><?php echo "{$record->getBookTitle()}"; ?></td>
				</form>
			</tr>
			<?php endforeach; ?>
		</table>
		<a href="../Control/index.php?action=home">Home</a>
	</body>
</html>

<?php 
	if(isset($confirm)){
		if($confirm == 'yes'){ echo "<script type='text/javascript'>alert('Book Was Returned Successfully!');</script>"; }

		else{ echo "<script type='text/javascript'>alert('Error!');</script>"; }
	}
?>