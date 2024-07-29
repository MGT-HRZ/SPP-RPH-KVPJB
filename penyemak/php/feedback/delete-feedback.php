<?php

    include_once '../config.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM pelanggan WHERE id_pelanggan = '$id';";
	$result = mysqli_query($connect, $sql);

	if ($result) {
		header('Location: ../dashboard.php?DELETE-FEEDBACK-SUCCESS');
	}

	else {
		header('Location: ../dashboard.php?DELETE-FEEDBACK-FAIL');
	}

?>