<?php

	include 'conn.php';

	$sql = "SELECT * FROM todo_table";
	$res = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($res)){
		echo "<li class='collection-item'><div>".$row['task']."<button href='#' value=".$row['id']." class='secondary-content'><i class='material-icons icon-red'>clear</i></button></div>";
	}