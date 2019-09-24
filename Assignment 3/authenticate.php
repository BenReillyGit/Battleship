<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'cs230lab5');

	// initialize variables
	$creator = "";
	$title = "";
	$type = "";
	$isbn = "";
	$id = 0;
	$date = "";
	$language = "";
	$description = "";
	$update = false;

	if (isset($_POST['save'])) {
		$creator = $_POST['Creator'];
		$title = $_POST['Title'];
		$type = $_POST['Type'];
		$isbn = $_POST['ISBN'];
		$date = $_POST['Date'];
		$language = $_POST['Language'];
		$description = $_POST['Description'];

		mysqli_query($db, "INSERT INTO ebook_metadata (creator, title, type, isbn, date, language, description) VALUES ('$creator', '$title', '$type', '$isbn', '$date', '$language', '$description')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: Table.php');
	}
	
	if (isset($_POST['update'])) {
		$id = $_POST['ID'];
		$creator = $_POST['Creator'];
		$title = $_POST['Title'];
		$type = $_POST['Type'];
		$isbn = $_POST['ISBN'];
		$date = $_POST['Date'];
		$language = $_POST['Language'];
		$description = $_POST['Description'];
	
	mysqli_query($db, "UPDATE ebook_metadata SET creator='$creator', title='$title', type='$type', isbn='$isbn', date='$date', language='$language', description='$description' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: Table.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM ebook_metadata WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: Table.php');
}

