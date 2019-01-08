<?php

	include 'conn.php';

	$delId = $_GET['id'];

	$sql = "DELETE FROM todo_table WHERE id = $delId";
	$res = mysqli_query($conn, $sql);
	if($res === TRUE){
		echo 1;
	} else {
		echo 0;
	}