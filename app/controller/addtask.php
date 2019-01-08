<?php

	include 'conn.php';

	$task = $_POST['addNewTask'];

	$sql = "INSERT INTO todo_table(task) VALUES ('$task')";
	$result = mysqli_query($conn, $sql);

	if($result === TRUE) {
		echo 1;
	} else {
		echo 0;
	}

	mysqli_close($conn);