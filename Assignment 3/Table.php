<?php  include('authenticate.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM ebook_metadata WHERE ID=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$creator = $n['Creator'];
			$title = $n['Title'];
			$type = $n['Type'];
			$isbn = $n['ISBN'];
			$date = $n['Date'];
			$language = $n['Language'];
			$description = $n['Description'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CS230 Assignment 5</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>
	
	<?php $results = mysqli_query($db, "SELECT * FROM ebook_metadata"); ?>

	<table>
		<thead>
			<tr>
			  <th>ID</th>
			  <th>Creator</th>
			  <th>Title</th>
			  <th>Type</th>
			  <th>ISBN</th>
			  <th>Date</th>
			  <th>Language</th>
			  <th>Description</th>
			  <th colspan="2">Action</th>
			</tr>
		</thead>
		
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
			
				<td><?php echo $row['ID']; ?></td>
				<td><?php echo $row['Creator']; ?></td>
				<td><?php echo $row['Title']; ?></td>
				<td><?php echo $row['Type']; ?></td>
				<td><?php echo $row['ISBN']; ?></td>
				<td><?php echo $row['Date']; ?></td>
				<td><?php echo $row['Language']; ?></td>
				<td><?php echo $row['Description']; ?></td>
				<td>
					<a href="Table.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
				</td>
				<td>
					<a href="authenticate.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	
	<form method="post" action="authenticate.php" >
			<input type="hidden" name="ID" value="<?php echo $id; ?>">
		
		<div class="input-group">
			<label>Creator</label>
			<input type="text" name="Creator" value="<?php echo $creator; ?>">
		</div>
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="Title" value="<?php echo $title; ?>">
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="Type" value="<?php echo $type; ?>">
		</div>
		<div class="input-group">
			<label>ISBN</label>
			<input type="text" name="ISBN" value="<?php echo $isbn; ?>">
		</div>
		<div class="input-group">
			<label>Date</label>
			<input type="text" name="Date" value="<?php echo $date; ?>">
		</div>
		<div class="input-group">
			<label>Language</label>
			<input type="text" name="Language" value="<?php echo $language; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="Description" value="<?php echo $description; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>